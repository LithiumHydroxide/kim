<?php
/**
 * Header Partial - Kimathi Rukunga
 */

// Default page title if not set
if (!isset($pageTitle)) {
    $pageTitle = "Kimathi Rukunga | Scalable Digital Solutions";
} else {
    $pageTitle = htmlspecialchars($pageTitle) . " | Kimathi Rukunga";
}

// Get site config if not already loaded
if (!isset($config)) {
    include __DIR__ . '/config.php';

// Add this after session_start() if not already there
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if(!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Character Encoding & Viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Page Title & SEO -->
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="Kimathi Rukunga builds scalable web platforms, automation tools, and data-driven solutions for modern businesses.">
    <meta name="author" content="Kimathi Rukunga">
    
    <!-- Favicon (Optional - comment out if file doesn't exist yet) -->
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Critical CSS Inline (Prevents flash of unstyled content) -->
    <style>
        :root{
            --bg-primary:#0a0e17;
            --text-primary:#f9fafb;
            --text-secondary:#9ca3af;
            --accent:#3b82f6;
            --border:#374151;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{
            font-family:'Inter',system-ui,sans-serif;
            background:var(--bg-primary);
            color:var(--text-primary);
            line-height:1.6;
            -webkit-font-smoothing:antialiased;
        }
        .navbar{
            position:sticky;
            top:0;
            z-index:1000;
            background:rgba(10,14,23,0.9);
            backdrop-filter:blur(12px);
            border-bottom:1px solid var(--border);
        }
        .container{
            width:100%;
            max-width:1200px;
            margin:0 auto;
            padding:0 2rem;
        }
        .navbar-inner{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:1rem 2rem;
        }
        .logo{
            text-decoration:none;
            font-weight:700;
            font-size:1.25rem;
            color:var(--text-primary);
        }
        .logo-divider{color:var(--accent);}
        .nav-list{
            display:flex;
            list-style:none;
            gap:2rem;
        }
        .nav-link{
            color:var(--text-secondary);
            text-decoration:none;
            font-weight:500;
            transition:color 0.3s ease;
        }
        .nav-link:hover{color:var(--text-primary);}
        .btn{
            display:inline-flex;
            align-items:center;
            padding:0.75rem 1.5rem;
            border-radius:0.5rem;
            font-weight:500;
            text-decoration:none;
            transition:all 0.3s ease;
            cursor:pointer;
            border:none;
        }
        .btn-primary{
            background:var(--accent);
            color:white;
        }
        .btn-primary:hover{
            background:#2563eb;
            transform:translateY(-2px);
        }
        .mobile-toggle{
            display:none;
            background:none;
            border:none;
            cursor:pointer;
            padding:0.5rem;
        }
        .hamburger,
        .hamburger::before,
        .hamburger::after{
            display:block;
            width:24px;
            height:2px;
            background:var(--text-primary);
            position:relative;
            transition:all 0.3s ease;
        }
        .hamburger::before,
        .hamburger::after{
            content:'';
            position:absolute;
            left:0;
        }
        .hamburger::before{top:-8px;}
        .hamburger::after{top:8px;}
        .nav-mobile{
            display:none;
            position:absolute;
            top:100%;
            left:0;
            right:0;
            background:var(--bg-primary);
            border-bottom:1px solid var(--border);
            padding:1rem 2rem;
        }
        .nav-mobile.is-active{display:block;}
        .nav-mobile-list{
            list-style:none;
            display:flex;
            flex-direction:column;
            gap:1rem;
        }
        .nav-mobile-link{
            color:var(--text-primary);
            text-decoration:none;
            display:block;
            padding:0.5rem 0;
        }
        /* Skip Link for Accessibility */
        .skip-link{
            position:absolute;
            top:-40px;
            left:0;
            background:var(--accent);
            color:white;
            padding:0.75rem 1.5rem;
            z-index:2000;
            text-decoration:none;
        }
        .skip-link:focus{top:0;}
    </style>
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- JavaScript Detection -->
    <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>
</head>
<body>
    <!-- Skip Link for Accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Sticky Navigation Bar -->
    <header class="navbar" role="banner">
        <div class="container navbar-inner">
            <!-- Logo -->
            <a href="index.php" class="logo" aria-label="Kimathi Rukunga Home">
                <span class="logo-text">KIMATHI <span class="logo-divider">//</span> SYSTEMS</span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="nav-desktop" role="navigation" aria-label="Primary">
                <ul class="nav-list">
                    <li><a href="services.php" class="nav-link">Services</a></li>
                    <li><a href="projects.php" class="nav-link">Work</a></li>
                    <li><a href="index.php#process" class="nav-link">Process</a></li>
                    <li><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </nav>
            
            <!-- Primary CTA -->
            <a href="contact.php" class="btn btn-primary btn-nav">Start a Project</a>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
        </div>
        
        <!-- Mobile Navigation (Hidden by default) -->
        <nav class="nav-mobile" role="navigation" aria-label="Mobile" hidden>
            <ul class="nav-mobile-list">
                <li><a href="services.php" class="nav-mobile-link">Services</a></li>
                <li><a href="projects.php" class="nav-mobile-link">Work</a></li>
                <li><a href="index.php#process" class="nav-mobile-link">Process</a></li>
                <li><a href="contact.php" class="nav-mobile-link">Contact</a></li>
                <li><a href="contact.php" class="btn btn-primary" style="width:100%;justify-content:center;">Start a Project</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Main Content Wrapper -->
    <main id="main-content" tabindex="-1">