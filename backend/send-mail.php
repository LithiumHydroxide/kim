<?php
/**
 * Contact Form Processor - Kimathi Rukunga
 * Handles form submission with PHPMailer for reliable email delivery
 * 
 * Deployed on Render.com with SMTP support
 */

// ===== PHPMailer Namespace Imports (MUST be at top level) =====
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Start session for CSRF and rate limiting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set JSON response header
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Include configuration
require_once __DIR__ . '/../includes/config.php';

// ===== LOAD PHPMAILER AUTOLOADER =====
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
$phpMailerAvailable = false;

if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
    // Verify PHPMailer class is actually loaded
    $phpMailerAvailable = class_exists('PHPMailer\PHPMailer\PHPMailer');
}

// ===== SECURITY: CSRF Token Validation =====
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Security token missing. Please refresh and try again.']);
    exit;
}

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Security token invalid. Please refresh and try again.']);
    exit;
}

// ===== SECURITY: Rate Limiting =====
$rateLimitWindow = 300; // 5 minutes
$maxRequests = 3;

if (!isset($_SESSION['form_submissions'])) {
    $_SESSION['form_submissions'] = [];
}

// Clean old submissions
$_SESSION['form_submissions'] = array_filter($_SESSION['form_submissions'], function($timestamp) use ($rateLimitWindow) {
    return $timestamp > (time() - $rateLimitWindow);
});

// Check rate limit
if (count($_SESSION['form_submissions']) >= $maxRequests) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Too many attempts. Please wait 5 minutes.']);
    exit;
}

// Record this submission
$_SESSION['form_submissions'][] = time();

// ===== INPUT SANITIZATION =====
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Get and sanitize form data
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$company = sanitizeInput($_POST['company'] ?? '');
$service = sanitizeInput($_POST['service'] ?? '');
$budget = sanitizeInput($_POST['budget'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');
$consent = isset($_POST['consent']) && $_POST['consent'] === 'on';

// ===== SERVER-SIDE VALIDATION =====
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please enter your full name';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (empty($message) || strlen($message) < 20) {
    $errors[] = 'Please provide more project details (min. 20 characters)';
}

if (!$consent) {
    $errors[] = 'You must agree to the privacy policy';
}

// Return validation errors
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => implode(', ', $errors)
    ]);
    exit;
}

// ===== PREPARE EMAIL CONTENT =====
$recipientEmail = getenv('SITE_EMAIL') ?: $config['email'];
$subject = "New Inquiry: " . ($service ?: 'General') . " - " . $name;

$htmlBody = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
        .header { background: #3b82f6; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9fafb; padding: 25px; border: 1px solid #e5e7eb; }
        .field { margin-bottom: 12px; }
        .label { font-weight: 600; color: #1f2937; }
        .value { color: #4b5563; margin-top: 4px; }
        .message { background: white; padding: 15px; border-radius: 6px; margin: 15px 0; }
        .footer { background: #1f2937; color: #9ca3af; padding: 15px; text-align: center; font-size: 12px; border-radius: 0 0 8px 8px; }
        a { color: #3b82f6; }
    </style>
</head>
<body>
    <div class='header'>
        <h2 style='margin: 0;'>📨 New Contact Form Submission</h2>
        <p style='margin: 5px 0 0 0; opacity: 0.9;'>Kimathi Rukunga</p>
    </div>
    <div class='content'>
        <div class='field'><div class='label'>Name:</div><div class='value'>{$name}</div></div>
        <div class='field'><div class='label'>Email:</div><div class='value'><a href='mailto:{$email}'>{$email}</a></div></div>
        <div class='field'><div class='label'>Company:</div><div class='value'>" . ($company ?: 'Not provided') . "</div></div>
        <div class='field'><div class='label'>Service:</div><div class='value'>" . ($service ?: 'Not specified') . "</div></div>
        <div class='field'><div class='label'>Budget:</div><div class='value'>" . ($budget ?: 'Not specified') . "</div></div>
        <div class='field'><div class='label'>Message:</div><div class='message'>" . nl2br($message) . "</div></div>
        <div class='field'><div class='label'>Submitted:</div><div class='value'>" . date('F j, Y, g:i a T') . "</div></div>
        <div class='field'><div class='label'>IP Address:</div><div class='value'>" . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "</div></div>
    </div>
    <div class='footer'>
        <p>© " . date('Y') . " Kimathi Rukunga. All rights reserved.</p>
        <p>Reply directly to: <a href='mailto:{$email}'>{$email}</a></p>
    </div>
</body>
</html>";

$textBody = "New Contact Form Submission - Kimathi Rukunga
=============================================
Name: $name
Email: $email
Company: " . ($company ?: 'Not provided') . "
Service: " . ($service ?: 'Not specified') . "
Budget: " . ($budget ?: 'Not specified') . "
Submitted: " . date('F j, Y, g:i a T') . "
IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "

Message:
--------
$message

=============================================
Reply to: $email
";

// ===== SEND EMAIL =====
$mailSent = false;
$errorMessage = '';

if ($phpMailerAvailable) {
    // ===== PHPMailer Method (Recommended) =====
    try {
        $mail = new PHPMailer(true);
        
        // SMTP Configuration from Render environment variables
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST') ?: 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USER') ?: '';
        $mail->Password = getenv('SMTP_PASS') ?: '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPAutoTLS = true;
        
        // Timeouts for Render environment
        $mail->Timeout = 30;
        
        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($recipientEmail);
        $mail->addReplyTo($email, $name);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $htmlBody;
        $mail->AltBody = $textBody;
        
        // Send
        $mail->send();
        $mailSent = true;
        
    } catch (Exception $e) {
        error_log("PHPMailer Error: " . $e->getMessage());
        $errorMessage = 'Email service error. Please try again later.';
    }
    
} else {
    // ===== Fallback: Basic mail() function (for testing only) =====
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: {$name} <{$email}>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    if (mail($recipientEmail, $subject, $htmlBody, $headers)) {
        $mailSent = true;
    } else {
        $errorMessage = 'Server mail() function failed';
        error_log("mail() failed for: $email");
    }
}

// ===== LOG SUBMISSION =====
$logEntry = sprintf(
    "[%s] %s - %s - %s - %s\n",
    date('Y-m-d H:i:s'),
    $name,
    $email,
    $service ?: 'General',
    $mailSent ? 'SENT' : 'FAILED'
);
error_log($logEntry);

// ===== RESPONSE =====
if ($mailSent) {
    // Regenerate CSRF token for next submission
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you! Your message has been sent. I will respond within 24 hours.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => $errorMessage ?: 'Sorry, there was an error sending your message. Please contact us directly at ' . htmlspecialchars($config['email'])
    ]);
}
?>