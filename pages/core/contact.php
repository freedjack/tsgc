<?php

// SEO settings for contact page
$page_title = 'Contact Us | Book a Discovery Call';
$page_description = 'Get in touch to discuss bespoke roleplay training, medical simulation, or leadership workshops. Design a scenario for your specific challenges.';
$page_keywords = 'contact serious games, book discovery call, corporate training inquiry, bespoke training consultation';
// Let header compute canonical based on request URI

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/andrey-metelev-games.jpg';
$hero_title = 'Get in Touch';
$hero_subtitle = "Ready to transform your team's training experience?";
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Contact Content -->
<div class="container">
    <div class="content-grid">
        <!-- Contact Form -->
        <div class="content-card">
            <h2>Send us a Message</h2>
            <form id="contact-form" aria-describedby="form-status" novalidate>
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required autocomplete="name" aria-describedby="name-help">
                    <div id="name-help" class="help-text">Please enter your full name</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required autocomplete="email" aria-describedby="email-help">
                    <div id="email-help" class="help-text">We'll use this to get back to you</div>
                </div>
                
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" autocomplete="organization" aria-describedby="company-help">
                    <div id="company-help" class="help-text">Your organization name (optional)</div>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" autocomplete="tel" aria-describedby="phone-help">
                    <div id="phone-help" class="help-text">Best number to reach you (optional)</div>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" required aria-describedby="message-help" placeholder="Tell us about your training needs, goals, or any questions you have..."></textarea>
                    <div id="message-help" class="help-text">Please provide details about your training requirements</div>
                </div>
                
                <div class="form-group">
                    <label for="preferred_contact">Preferred Contact Method</label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="preferred_contact" value="email" checked>
                            <span class="radio-text">Email</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="preferred_contact" value="phone">
                            <span class="radio-text">Phone</span>
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="newsletter" value="yes">
                        <span class="checkbox-text">Subscribe to our newsletter for training tips and updates</span>
                    </label>
                </div>
                
                <div id="form-status" class="sr-only" aria-live="polite"></div>
                <button type="submit" class="cta-button">Send Message</button>
            </form>
        </div>
        
        <!-- Contact Information -->
        <div class="content-card">
            <h2>Contact Information</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <p>
                        <a href="https://tidycal.com/freedjack/book-a-call" class="cta-button" rel="noopener noreferrer" target="_blank">Book a call</a>
                    </p>
                </div>
                <div class="contact-item">
                    <h3>Email</h3>
                    <p>
                        <span id="email-reveal-row" class="contact-email-row">
                            <a href="#" id="email-link" class="email-obfuscated" data-email="hello@theseriousgamescompany.com">Click to reveal email address</a>
                        </span>
                        <span id="email-copy-status" class="sr-only" aria-live="polite"></span>
                        <noscript>
                            <br><small>Email: <span class="rot13">uryyb@gurfrevfntrfpbzrpbz.pbz</span></small>
                        </noscript>
                    </p>
                </div>
                
            </div>
            
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
                const submitButton = form.querySelector('button[type="submit"]');
                const formStatus = document.getElementById('form-status');
                const accessKey = <?php echo json_encode((defined('WEB3FORMS_ACCESS_KEY') && WEB3FORMS_ACCESS_KEY) ? WEB3FORMS_ACCESS_KEY : ''); ?>;
    
    // ROT13 decoder function
    function rot13(str) {
        return str.replace(/[a-zA-Z]/g, function(c) {
            return String.fromCharCode((c <= 'Z' ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
        });
    }
    
    function copyTextToClipboard(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise(function(resolve, reject) {
            const ta = document.createElement('textarea');
            ta.value = text;
            ta.setAttribute('readonly', '');
            ta.style.position = 'fixed';
            ta.style.left = '-9999px';
            document.body.appendChild(ta);
            ta.select();
            try {
                if (document.execCommand('copy')) {
                    resolve();
                } else {
                    reject(new Error('copy failed'));
                }
            } catch (err) {
                reject(err);
            } finally {
                document.body.removeChild(ta);
            }
        });
    }

    // Email obfuscation functionality
    function setupEmailObfuscation() {
        // Handle clickable email links
        const emailLinks = document.querySelectorAll('.email-obfuscated');
        emailLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const email = this.getAttribute('data-email');
                if (email) {
                    this.textContent = email;
                    this.href = 'mailto:' + email;
                    this.classList.add('revealed');
                    const row = document.getElementById('email-reveal-row');
                    const statusEl = document.getElementById('email-copy-status');
                    if (row && !row.querySelector('.copy-email-btn')) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'copy-email-btn';
                        btn.textContent = 'Copy';
                        btn.setAttribute('aria-label', 'Copy email address to clipboard');
                        btn.addEventListener('click', function() {
                            copyTextToClipboard(email).then(function() {
                                btn.textContent = 'Copied';
                                if (statusEl) {
                                    statusEl.textContent = 'Email copied to clipboard';
                                }
                                window.setTimeout(function() {
                                    btn.textContent = 'Copy';
                                    if (statusEl) {
                                        statusEl.textContent = '';
                                    }
                                }, 2500);
                            }).catch(function() {
                                if (statusEl) {
                                    statusEl.textContent = 'Could not copy — select the address and copy manually';
                                }
                            });
                        });
                        row.appendChild(btn);
                    }
                }
            });
        });
        
        // Handle obfuscated text spans
        const emailTexts = document.querySelectorAll('.email-obfuscated-text');
        emailTexts.forEach(span => {
            span.addEventListener('click', function() {
                const email = this.getAttribute('data-email');
                if (email) {
                    this.textContent = email;
                    this.style.cursor = 'default';
                }
            });
        });
        
        // Auto-decode ROT13 text for users with JavaScript
        const rot13Elements = document.querySelectorAll('.rot13');
        rot13Elements.forEach(element => {
            const encodedText = element.textContent;
            const decodedText = rot13(encodedText);
            element.textContent = decodedText;
            element.style.cursor = 'default';
            element.title = 'Email address (auto-decoded)';
        });
    }
    
    // Initialize email obfuscation
    setupEmailObfuscation();
    
    // Remove the default form action to handle with JavaScript
    form.removeAttribute('action');
    form.removeAttribute('method');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Show loading state
        submitButton.disabled = true;
        submitButton.classList.add('submitting');
        submitButton.innerHTML = '<span class="spinner"></span>Sending...';
        form.classList.add('form-submitting');
        
        // Remove any existing messages
                const existingMessages = form.querySelectorAll('.form-success, .form-error');
        existingMessages.forEach(msg => msg.remove());
        
        try {
            // Collect form data
            const formData = new FormData(form);
            const data = {
                access_key: accessKey,
                subject: 'New Contact Form Submission - Serious Games',
                name: formData.get('name'),
                email: formData.get('email'),
                company: formData.get('company'),
                phone: formData.get('phone'),
                training_interest: formData.get('training_interest'),
                participants: formData.get('participants'),
                message: formData.get('message'),
                preferred_contact: formData.get('preferred_contact'),
                newsletter: formData.get('newsletter') || 'no'
            };

            if (!data.access_key) {
                throw new Error('Missing Web3Forms access key');
            }
            
            // Submit to Web3Forms
            const response = await fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Show success message
                const successMessage = document.createElement('div');
                successMessage.className = 'form-success';
                successMessage.innerHTML = `
                    <h3>Thank you for your message!</h3>
                    <p>We've received your inquiry and will get back to you within 24 hours.</p>
                `;
                form.insertBefore(successMessage, form.firstChild);
                if (formStatus) {
                    formStatus.textContent = 'Form submitted successfully.';
                }
                
                // Reset form
                form.reset();
                
                // Scroll to success message
                successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                throw new Error('Form submission failed');
            }
            
        } catch (error) {
            console.error('Form submission error:', error);
            
            // Show error message
            const errorMessage = document.createElement('div');
            errorMessage.className = 'form-error';
            errorMessage.innerHTML = `
                <h3>Sorry, something went wrong</h3>
                <p>Please try again or contact us directly at <span class="email-obfuscated-text" data-email="hello@theseriousgamescompany.com">[email protected]</span></p>
            `;
            form.insertBefore(errorMessage, form.firstChild);
            if (formStatus) {
                formStatus.textContent = 'There was an error submitting the form.';
            }
            
            // Scroll to error message
            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Re-setup email obfuscation for the new error message
            setupEmailObfuscation();
        } finally {
            // Reset button state
            submitButton.disabled = false;
            submitButton.classList.remove('submitting');
            submitButton.innerHTML = 'Send Message';
            form.classList.remove('form-submitting');
        }
    });
    
    // Form validation
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('error');
            }
        });
    });
});
</script>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
