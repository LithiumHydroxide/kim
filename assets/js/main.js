/**
 * Main JavaScript for Kimathi Rukunga
 * Handles: Scroll animations, mobile menu, counter animations
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // ===== SCROLL ANIMATIONS (Intersection Observer) =====
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.fade-in-section').forEach(section => {
        observer.observe(section);
    });
    
    // ===== COUNTER ANIMATIONS =====
    const animateCounters = () => {
        const counters = document.querySelectorAll('.count');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const step = target / (duration / 16); // 60fps
            let current = 0;
            
            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Only start when element is in view
            const counterObserver = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    updateCounter();
                    counterObserver.unobserve(counter);
                }
            }, { threshold: 0.5 });
            
            counterObserver.observe(counter);
        });
    };
    animateCounters();
    
    // ===== MOBILE NAVIGATION TOGGLE =====
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navLinks = document.querySelector('.nav-links');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('is-active');
            mobileToggle.setAttribute('aria-expanded', 
                navLinks.classList.contains('is-active'));
        });
    }
    
    // ===== SMOOTH SCROLL FOR ANCHOR LINKS =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Close mobile menu if open
                navLinks?.classList.remove('is-active');
            }
        });
    });
    
    // ===== FORM ENHANCEMENTS (if on contact page) =====
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Simple validation
            const email = contactForm.querySelector('input[type="email"]');
            if (email && !email.validity.valid) {
                email.focus();
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Sending...';
            
            try {
                const formData = new FormData(contactForm);
                const response = await fetch('backend/send-mail.php', {
                    method: 'POST',
                    body: formData
                });
                
                if (response.ok) {
                    contactForm.reset();
                    submitBtn.innerHTML = '✓ Sent!';
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }, 3000);
                } else {
                    throw new Error('Form submission failed');
                }
            } catch (error) {
                console.error('Error:', error);
                submitBtn.innerHTML = 'Try Again';
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 2000);
            }
        });
    }
});

// ===== MOBILE NAVIGATION TOGGLE =====
const mobileToggle = document.querySelector('.mobile-toggle');
const navMobile = document.getElementById('nav-mobile');

if (mobileToggle && navMobile) {
    mobileToggle.addEventListener('click', () => {
        const isExpanded = mobileToggle.getAttribute('aria-expanded') === 'true';
        mobileToggle.setAttribute('aria-expanded', !isExpanded);
        navMobile.classList.toggle('is-active');
        navMobile.hidden = isExpanded;
        
        // Animate hamburger to X
        const hamburger = mobileToggle.querySelector('.hamburger');
        if (!isExpanded) {
            hamburger.style.background = 'transparent';
            hamburger.style.setProperty('--before-top', '0');
            hamburger.style.setProperty('--before-rotate', '45deg');
            hamburger.style.setProperty('--after-top', '0');
            hamburger.style.setProperty('--after-rotate', '-45deg');
        } else {
            hamburger.style.background = '';
            hamburger.style.removeProperty('--before-top');
            hamburger.style.removeProperty('--before-rotate');
            hamburger.style.removeProperty('--after-top');
            hamburger.style.removeProperty('--after-rotate');
        }
    });
    
    // Close mobile menu when clicking a link
    navMobile.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navMobile.classList.remove('is-active');
            navMobile.hidden = true;
            mobileToggle.setAttribute('aria-expanded', 'false');
        });
    });
}

// ===== BACK TO TOP BUTTON =====
const backToTopBtn = document.getElementById('back-to-top');

if (backToTopBtn) {
    // Show/hide button on scroll
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 400) {
            backToTopBtn.classList.add('is-visible');
            backToTopBtn.hidden = false;
        } else {
            backToTopBtn.classList.remove('is-visible');
            backToTopBtn.hidden = true;
        }
    });
    
    // Smooth scroll to top
    backToTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ===== NAVBAR SCROLL EFFECT =====
const navbar = document.querySelector('.navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 50) {
            navbar.style.boxShadow = 'var(--shadow-md)';
            navbar.style.background = 'rgba(10, 14, 23, 0.95)';
        } else {
            navbar.style.boxShadow = 'none';
            navbar.style.background = 'rgba(10, 14, 23, 0.85)';
        }
    });
}