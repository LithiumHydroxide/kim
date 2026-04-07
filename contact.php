<?php
/**
 * Contact Page - Kimathi Systems
 * Static version - no form processing required
 */

$pageTitle = "Contact";
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="contact-page-static">

    <!-- Hero Section -->
    <section class="page-hero fade-in-section">
        <div class="container">
            <p class="page-subtitle">Get In Touch</p>
            <h1 class="page-title">Let's Build Something Great Together</h1>
            <p class="page-description">
                Have a project in mind? Reach out via email, WhatsApp, or LinkedIn. 
                I respond to all inquiries within 24 hours.
            </p>
        </div>
    </section>

    <!-- Contact Methods Grid -->
    <section class="contact-methods fade-in-section">
        <div class="container">
            <div class="methods-grid">
                
                <!-- Email -->
                <article class="method-card">
                    <div class="method-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <p>The best way to discuss project details, share documents, and get a written record of our conversation.</p>
                    <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>?subject=Project Inquiry" class="method-btn">
                        Send Email →
                    </a>
                    <button class="copy-email-btn" data-email="<?php echo htmlspecialchars($config['email']); ?>">
                        Copy Email Address
                    </button>
                    <span class="copy-success" style="display:none;">✓ Copied!</span>
                </article>

                <!-- Chatbot -->
                <article class="method-card">
                    <div class="method-icon chatbot">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            <circle cx="9" cy="10" r="1" fill="currentColor"></circle>
                            <circle cx="15" cy="10" r="1" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <h3>Chatbot</h3>
                    <p>Get instant answers to common questions. Our AI assistant is available 24/7 to help you.</p>
                    <a href="#" class="method-btn chatbot-btn">
                        Start Chat →
                    </a>
                </article>

                <!-- LinkedIn -->
                <article class="method-card">
                    <div class="method-icon linkedin">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </div>
                    <h3>LinkedIn</h3>
                    <p>Connect professionally, view my experience, and send a direct message through LinkedIn.</p>
                    <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" class="method-btn linkedin-btn" target="_blank" rel="noopener noreferrer">
                        Connect on LinkedIn →
                    </a>
                </article>

                <!-- Calendly (Optional) -->
                <article class="method-card">
                    <div class="method-icon calendar">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <h3>Schedule a Call</h3>
                    <p>Book a free 15-minute consultation at a time that works for you. No back-and-forth emails.</p>
                    <a href="https://calendly.com/your-link" class="method-btn" target="_blank" rel="noopener noreferrer">
                        Book a Time →
                    </a>
                    <p class="method-note">Replace with your Calendly link (free tier available)</p>
                </article>

            </div>
        </div>
    </section>

    <!-- What to Expect -->
    <section class="contact-expectations fade-in-section">
        <div class="container">
            <h2 class="section-title">What Happens Next?</h2>
            <div class="expectations-grid">
                <div class="expectation-item">
                    <span class="step-number">1</span>
                    <h4>You Reach Out</h4>
                    <p>Send an email, WhatsApp message, or LinkedIn connection request with your project idea.</p>
                </div>
                <div class="expectation-item">
                    <span class="step-number">2</span>
                    <h4>I Respond Within 24h</h4>
                    <p>I'll acknowledge your message and ask clarifying questions to understand your needs.</p>
                </div>
                <div class="expectation-item">
                    <span class="step-number">3</span>
                    <h4>Free Consultation</h4>
                    <p>We'll schedule a brief call to discuss scope, timeline, and how I can help.</p>
                </div>
                <div class="expectation-item">
                    <span class="step-number">4</span>
                    <h4>Clear Proposal</h4>
                    <p>If we're a good fit, I'll provide a detailed proposal with pricing and next steps.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="contact-faq fade-in-section">
        <div class="container">
            <h2 class="section-title">Quick Answers</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>What information should I include?</h4>
                    <p>Briefly describe your project, goals, timeline, and budget range (if known). The more context, the better I can help.</p>
                </div>
                <div class="faq-item">
                    <h4>Do you work with international clients?</h4>
                    <p>Yes! I work with clients globally. All communication and meetings can be conducted remotely via video call.</p>
                </div>
                <div class="faq-item">
                    <h4>What's your typical project timeline?</h4>
                    <p>Small projects: 2-4 weeks. Medium: 1-3 months. Large: 3-6 months. Timelines depend on scope and complexity.</p>
                </div>
                <div class="faq-item">
                    <h4>Do you offer ongoing support?</h4>
                    <p>Yes. I offer maintenance retainers, feature additions, and technical support after launch.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="contact-cta fade-in-section">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Choose the contact method that works best for you. I look forward to hearing about your project!</p>
            <div class="cta-buttons">
                <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>?subject=Project Inquiry" class="btn btn-primary">
                    Send Email
                </a>
                <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                    Connect on LinkedIn
                </a>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Copy Email Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const copyBtn = document.querySelector('.copy-email-btn');
    const successMsg = document.querySelector('.copy-success');
    
    if(copyBtn) {
        copyBtn.addEventListener('click', async () => {
            const email = copyBtn.getAttribute('data-email');
            try {
                await navigator.clipboard.writeText(email);
                copyBtn.style.display = 'none';
                successMsg.style.display = 'inline';
                setTimeout(() => {
                    copyBtn.style.display = 'inline';
                    successMsg.style.display = 'none';
                }, 2000);
            } catch(err) {
                // Fallback for older browsers
                const textarea = document.createElement('textarea');
                textarea.value = email;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                
                copyBtn.style.display = 'none';
                successMsg.style.display = 'inline';
                setTimeout(() => {
                    copyBtn.style.display = 'inline';
                    successMsg.style.display = 'none';
                }, 2000);
            }
        });
    }
});
</script>