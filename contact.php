<?php
/**
 * Contact Page - Kimathi Rukunga
 * Lead capture form for potential clients
 */

$pageTitle = "Contact";
include 'includes/config.php';
include 'includes/header.php';

// Check for success/error messages from form submission
$successMessage = isset($_GET['success']) ? htmlspecialchars($_GET['success']) : '';
$errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<main class="contact-page">

    <!-- Hero Section -->
    <section class="page-hero fade-in-section">
        <div class="container">
            <p class="page-subtitle">Get In Touch</p>
            <h1 class="page-title">Let's Build Something Great Together</h1>
            <p class="page-description">
                Have a project in mind? Want to discuss how technology can solve your business challenges? 
                Fill out the form below and I'll get back to you within 24 hours.
            </p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section fade-in-section">
        <div class="container">
            <div class="contact-grid">
                
                <!-- Contact Information -->
                <div class="contact-info">
                    <h2>Direct Contact</h2>
                    <p>Prefer to reach out directly? Use any of the following methods:</p>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="method-details">
                                <h4>Email</h4>
                                <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>">
                                    <?php echo htmlspecialchars($config['email']); ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                            </div>
                            <div class="method-details">
                                <h4>LinkedIn</h4>
                                <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener noreferrer">
                                    Connect on LinkedIn
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="method-details">
                                <h4>Response Time</h4>
                                <p>Within 24 hours</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-cta-box">
                        <h4>Ready to Start?</h4>
                        <p>Schedule a free 15-minute consultation to discuss your project requirements and how I can help.</p>
                        <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>?subject=Consultation Request" class="btn btn-secondary">
                            Book Consultation
                        </a>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2>Send a Message</h2>
                    
                    <!-- Success Message -->
                    <?php if($successMessage): ?>
                        <div class="form-message success">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span><?php echo $successMessage; ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Error Message -->
                    <?php if($errorMessage): ?>
                        <div class="form-message error">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <span><?php echo $errorMessage; ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Update the form tag in contact.php -->
<form action="https://formspree.io/f/YOUR_FORM_ID" method="POST" class="contact-form" id="contactForm">
    
    <div class="form-group">
        <label for="name">Full Name *</label>
        <input type="text" id="name" name="name" required placeholder="John Doe">
    </div>
    
    <div class="form-group">
        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" required placeholder="john@company.com">
    </div>
    
    <div class="form-group">
        <label for="company">Company Name</label>
        <input type="text" id="company" name="company" placeholder="Your Company (Optional)">
    </div>
    
    <div class="form-group">
        <label for="service">Service Interested In</label>
        <select id="service" name="service">
            <option value="">Select a service (Optional)</option>
            <?php foreach($services as $service): ?>
                <option value="<?php echo htmlspecialchars($service['title']); ?>">
                    <?php echo htmlspecialchars($service['title']); ?>
                </option>
            <?php endforeach; ?>
            <option value="Other">Other / Multiple Services</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="message">Project Details *</label>
        <textarea id="message" name="message" required placeholder="Tell me about your project..." rows="6"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary btn-large btn-submit">
        <span class="btn-text">Send Message</span>
        <span class="btn-loading" style="display: none;">Sending...</span>
    </button>
    
    <p class="form-note">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg>
        Your information is secure and will never be shared with third parties.
    </p>
</form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-faq fade-in-section">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-intro">Quick answers to common questions about working together.</p>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>What is your typical response time?</h4>
                    <p>I respond to all inquiries within 24 hours during business days. For urgent matters, please indicate this in your message.</p>
                </div>
                
                <div class="faq-item">
                    <h4>Do you offer free consultations?</h4>
                    <p>Yes! I offer a free 15-minute consultation to discuss your project requirements and determine if I'm a good fit.</p>
                </div>
                
                <div class="faq-item">
                    <h4>What industries do you work with?</h4>
                    <p>I work with businesses across various industries including finance, healthcare, e-commerce, agriculture, and professional services.</p>
                </div>
                
                <div class="faq-item">
                    <h4>Do you work with international clients?</h4>
                    <p>Yes, I work with clients globally. All communication and meetings can be conducted remotely via video call.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="contact-cta fade-in-section">
        <div class="container">
            <h2>Still Have Questions?</h2>
            <p>Feel free to reach out directly via email or LinkedIn. I'm happy to answer any questions about my services, process, or pricing.</p>
            <div class="cta-buttons">
                <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>" class="btn btn-primary">Send Email</a>
                <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">Connect on LinkedIn</a>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Contact Form Validation Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.btn-submit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Show loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
        
        try {
            const formData = new FormData(form);
            const formAction = form.getAttribute('action');
            
            const response = await fetch(formAction, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            });
            
            if(response.ok) {
                // Success
                form.reset();
                btnText.textContent = '✓ Message Sent!';
                btnText.style.display = 'inline';
                btnLoading.style.display = 'none';
                
                setTimeout(() => {
                    submitBtn.disabled = false;
                    btnText.textContent = 'Send Message';
                }, 3000);
            } else {
                throw new Error('Form submission failed');
            }
        } catch(error) {
            // Error
            btnText.textContent = 'Try Again';
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            
            setTimeout(() => {
                submitBtn.disabled = false;
                btnText.textContent = 'Send Message';
            }, 2000);
        }
    });
});
</script>
