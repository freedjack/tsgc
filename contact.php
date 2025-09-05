<?php

// SEO settings for contact page
$page_title = 'Contact Us | ' . SITE_NAME;
$page_description = 'Get in touch with The Serious Games Company to discuss your training needs. We\'re here to help transform your team\'s learning experience.';
$page_keywords = 'contact, training inquiry, serious games contact, corporate training consultation';
// Let header compute canonical based on request URI

include 'includes/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/large/andrey-metelev-games.jpg';
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
            <form id="contact-form" method="POST" action="process-contact.php" aria-describedby="form-status" novalidate>
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
                    <label for="training_interest">Training Interest</label>
                    <select id="training_interest" name="training_interest" aria-describedby="training-help">
                        <option value="">Select an option</option>
                        <option value="the-hack">The Hack - Cyber Security</option>
                        <option value="live-in-the-morning">Live in the Morning - TV Production</option>
                        <option value="covert-operations">Covert Operations Academy</option>
                        <option value="situation-room">The Situation Room - Crisis Management</option>
                        <option value="bespoke">Bespoke Training Solution</option>
                        <option value="general">General Inquiry</option>
                    </select>
                    <div id="training-help" class="help-text">Which training program interests you?</div>
                </div>
                
                <div class="form-group">
                    <label for="participants">Number of Participants</label>
                    <select id="participants" name="participants" aria-describedby="participants-help">
                        <option value="">Select an option</option>
                        <option value="1-10">1-10 people</option>
                        <option value="11-25">11-25 people</option>
                        <option value="26-50">26-50 people</option>
                        <option value="51-100">51-100 people</option>
                        <option value="100+">100+ people</option>
                    </select>
                    <div id="participants-help" class="help-text">Approximate number of participants</div>
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
                    <p><a href="mailto:hello@theseriousgamescompany.com">hello@theseriousgamescompany.com</a></p>
                </div>
                
                <div class="contact-item">
                    <h3>Phone</h3>
                    <p><a href="tel:+44123456789">+44 (0) 123 456 789</a></p>
                </div>
                
                <div class="contact-item">
                    <h3>Response Time</h3>
                    <p>We typically respond within 24 hours during business days.</p>
                </div>
            </div>
            
            <h3>What Happens Next?</h3>
            <ol>
                <li><strong>Initial Contact:</strong> We'll respond to your inquiry within 24 hours</li>
                <li><strong>Discovery Call:</strong> We'll schedule a call to discuss your needs in detail</li>
                <li><strong>Proposal:</strong> We'll create a customized training proposal for your organization</li>
                <li><strong>Planning:</strong> Once approved, we'll work together to plan the perfect training session</li>
                <li><strong>Delivery:</strong> We'll deliver an unforgettable training experience for your team</li>
            </ol>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="content-card container">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-grid">
        <div class="faq-item">
            <h3>How long does a typical training session last?</h3>
            <p>Our training sessions can range from half-day intensive workshops to multi-day comprehensive programs, depending on your needs and objectives.</p>
        </div>
        
        <div class="faq-item">
            <h3>Where do the training sessions take place?</h3>
            <p>We can deliver training at your location, at our dedicated training facilities, or at a venue of your choice. We're flexible to accommodate your preferences.</p>
        </div>
        
        <div class="faq-item">
            <h3>What's the ideal group size for training?</h3>
            <p>Our training works best with groups of 6-20 participants, but we can accommodate larger groups with additional facilitators.</p>
        </div>
        
        <div class="faq-item">
            <h3>Do you provide follow-up support?</h3>
            <p>Yes, we provide comprehensive debriefing sessions and can offer ongoing support to help reinforce learning and track progress.</p>
        </div>
        
        <div class="faq-item">
            <h3>Can you customize training for our specific industry?</h3>
            <p>Absolutely! We specialize in creating bespoke training scenarios tailored to your industry, challenges, and organizational culture.</p>
        </div>
        
        <div class="faq-item">
            <h3>What makes your training different from traditional methods?</h3>
            <p>Our immersive, hands-on approach engages participants actively in realistic scenarios, making learning more memorable and immediately applicable.</p>
        </div>
    </div>
</div>

<!-- FAQPage JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How long does a typical training session last?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our training sessions can range from half-day intensive workshops to multi-day comprehensive programs, depending on your needs and objectives."
      }
    },
    {
      "@type": "Question",
      "name": "Where do the training sessions take place?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We can deliver training at your location, at our dedicated training facilities, or at a venue of your choice. We're flexible to accommodate your preferences."
      }
    },
    {
      "@type": "Question",
      "name": "What's the ideal group size for training?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our training works best with groups of 6-20 participants, but we can accommodate larger groups with additional facilitators."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide follow-up support?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we provide comprehensive debriefing sessions and can offer ongoing support to help reinforce learning and track progress."
      }
    },
    {
      "@type": "Question",
      "name": "Can you customize training for our specific industry?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We specialize in creating bespoke training scenarios tailored to your industry, challenges, and organizational culture."
      }
    },
    {
      "@type": "Question",
      "name": "What makes your training different from traditional methods?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our immersive, hands-on approach engages participants actively in realistic scenarios, making learning more memorable and immediately applicable."
      }
    }
  ]
}
</script>

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
    color: var(--text-color);
    text-decoration: none;
}

.contact-item a:hover {
    color: var(--accent-color);
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
                <p>Please try again or contact us directly at <a href="mailto:hello@theseriousgamescompany.com">hello@theseriousgamescompany.com</a></p>
            `;
            form.insertBefore(errorMessage, form.firstChild);
            if (formStatus) {
                formStatus.textContent = 'There was an error submitting the form.';
            }
            
            // Scroll to error message
            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
