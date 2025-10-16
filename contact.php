<?php

// SEO settings for contact page
$page_title = 'Contact Us';
$page_description = 'Get in touch with The Serious Games Company to discuss your training needs. We\'re here to help transform your team\'s learning experience.';
$page_keywords = 'contact, training inquiry, serious games contact, corporate training consultation';
// Let header compute canonical based on request URI

include 'includes/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/andrey-metelev-games.jpg';
$hero_title = 'Get in Touch';
$hero_subtitle = "Ready to transform your team's training experience?";
include 'includes/hero.php';
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
                    <input type="text" id="name" name="name" required aria-describedby="name-help">
                    <div id="name-help" class="help-text">Please enter your full name</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required aria-describedby="email-help">
                    <div id="email-help" class="help-text">We'll use this to get back to you</div>
                </div>
                
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" aria-describedby="company-help">
                    <div id="company-help" class="help-text">Your organization name (optional)</div>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" aria-describedby="phone-help">
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
                    <h3>Email</h3>
                    <p>
                        <a href="#" id="email-link" class="email-obfuscated" data-email="hello@theseriousgamescompany.com">Click to reveal email address</a>
                        <noscript>
                            <br><small>Email: <span class="rot13">uryyb@gurfrevfntrfpbzrpbz.pbz</span></small>
                        </noscript>
                    </p>
                </div>
                
            </div>
            
        </div>
    </div>
</div>



<!-- Additional CSS for contact form -->
<style>
.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--primary-color);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    font-family: inherit;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--accent-color);
    box-shadow: 0 0 0 2px rgba(49, 133, 252, 0.1);
}

.form-group input.error,
.form-group select.error,
.form-group textarea.error {
    border-color: #dc3545;
}

.help-text {
    font-size: 0.875rem;
    color: #666;
    margin-top: 0.25rem;
}

.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.radio-group {
    display: flex;
    gap: 1rem;
    margin-top: 0.5rem;
}

.radio-label,
.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    margin-bottom: 0.5rem;
}

.radio-label input[type="radio"],
.checkbox-label input[type="checkbox"] {
    width: auto;
    margin: 0;
}

.contact-info {
    margin-bottom: 2rem;
}

.contact-item {
    margin-bottom: 1.5rem;
}

.contact-item h3 {
    color: var(--accent-color);
    margin-bottom: 0.5rem;
}

.contact-item a {
    color: var(--text-primary);
    text-decoration: none;
}

.contact-item a:hover {
    color: var(--accent-color);
}

/* Email obfuscation styles */
.email-obfuscated {
    cursor: pointer;
    user-select: none;
    transition: color 0.3s ease;
}

.email-obfuscated:hover {
    color: var(--accent-color);
}

.email-obfuscated.revealed {
    color: var(--text-primary);
    cursor: default;
}

.email-obfuscated-text {
    cursor: pointer;
    user-select: none;
    color: var(--accent-color);
    text-decoration: underline;
    transition: color 0.3s ease;
}

.email-obfuscated-text:hover {
    color: var(--primary-color);
}

/* ROT13 fallback for users without JavaScript */
.rot13 {
    font-family: monospace;
    background-color: #f8f9fa;
    padding: 2px 4px;
    border-radius: 3px;
    border: 1px solid #dee2e6;
    cursor: help;
    position: relative;
}

.rot13:hover::after {
    content: "Decode this ROT13 text to get the email address";
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1000;
    margin-bottom: 5px;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.faq-item h3 {
    color: var(--accent-color);
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.faq-item p {
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .radio-group {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .faq-grid {
        grid-template-columns: 1fr;
    }
}

/* Form submission states */
.form-submitting {
    opacity: 0.7;
    pointer-events: none;
}

.form-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1rem;
}

.form-error {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1rem;
}

.submit-button {
    position: relative;
}

.submit-button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.submit-button .spinner {
    display: none;
    width: 16px;
    height: 16px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-right: 8px;
}

.submit-button.submitting .spinner {
    display: inline-block;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
                const submitButton = form.querySelector('button[type="submit"]');
                const formStatus = document.getElementById('form-status');
    
    // ROT13 decoder function
    function rot13(str) {
        return str.replace(/[a-zA-Z]/g, function(c) {
            return String.fromCharCode((c <= 'Z' ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
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
                access_key: 'f18f8a67-2f51-48b7-a1d9-a6447eb6c62e', // Replace with your access key
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

<?php include 'includes/footer.php'; ?>
