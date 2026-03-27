// Main JavaScript file for The Serious Games Company website

document.addEventListener('DOMContentLoaded', function() {
    // Mobile navigation toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNavigation = document.querySelector('.main-navigation');
    
    if (mobileMenuToggle && mainNavigation) {
        // Initialize mobile menu in closed state
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mainNavigation.setAttribute('aria-expanded', 'false');
        
        // Toggle mobile menu
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mainNavigation.setAttribute('aria-expanded', !isExpanded);

            if (!isExpanded) {
                const firstLink = mainNavigation.querySelector('a[href]');
                if (firstLink) firstLink.focus();
            } else {
                mobileMenuToggle.focus();
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuToggle.contains(event.target) && !mainNavigation.contains(event.target)) {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mainNavigation.setAttribute('aria-expanded', 'false');
            }
        });
    }
    
    // Header scroll effect
    const siteHeader = document.querySelector('.site-header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Smooth scrolling for anchor links (respect user prefers-reduced-motion)
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            const target = href ? document.querySelector(href) : null;
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: prefersReducedMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Video facade: load Vimeo iframe only on user interaction
    document.querySelectorAll('.video-facade').forEach(function(facade) {
        function loadVideo() {
            var id = facade.dataset.vimeoId;
            var hash = facade.dataset.vimeoHash;
            if (!id) return;
            var src = 'https://player.vimeo.com/video/' + id +
                      '?h=' + (hash || '') + '&autoplay=1&dnt=1';
            var iframe = document.createElement('iframe');
            iframe.setAttribute('src', src);
            iframe.setAttribute('title', facade.getAttribute('aria-label') || 'Video');
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media');
            iframe.setAttribute('allowfullscreen', '');
            iframe.style.cssText = 'position:absolute;top:0;left:0;width:100%;height:100%;border-radius:8px';
            facade.replaceWith(iframe);
        }
        facade.addEventListener('click', loadVideo);
        facade.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                loadVideo();
            }
        });
    });

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Form validation and enhancement
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const name = this.querySelector('#name');
            const email = this.querySelector('#email');
            const message = this.querySelector('#message');
            
            let isValid = true;
            
            // Reset previous error states
            [name, email, message].forEach(field => {
                if (field) {
                    field.classList.remove('error');
                    const errorMessage = field.parentNode.querySelector('.error-message');
                    if (errorMessage) {
                        errorMessage.remove();
                    }
                }
            });
            
            // Validate name
            if (!name.value.trim()) {
                showFieldError(name, 'Name is required');
                isValid = false;
            }
            
            // Validate email
            if (!email.value.trim()) {
                showFieldError(email, 'Email is required');
                isValid = false;
            } else if (!isValidEmail(email.value)) {
                showFieldError(email, 'Please enter a valid email address');
                isValid = false;
            }
            
            // Validate message
            if (!message.value.trim()) {
                showFieldError(message, 'Message is required');
                isValid = false;
            }
            
            if (isValid) {
                // Here you would typically send the form data to your server
                // For now, we'll just show a success message
                showSuccessMessage('Thank you for your message! We\'ll get back to you soon.');
                this.reset();
            }
        });
    }
    
    // Helper function to show field errors
    function showFieldError(field, message) {
        field.classList.add('error');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }
    
    // Helper function to validate email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Helper function to show success message
    function showSuccessMessage(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = message;
        successDiv.style.cssText = `
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin: 1rem 0;
            border: 1px solid #c3e6cb;
        `;
        
        const contactForm = document.querySelector('#contact-form');
        contactForm.parentNode.insertBefore(successDiv, contactForm);
        
        // Remove success message after 5 seconds
        setTimeout(() => {
            successDiv.remove();
        }, 5000);
    }
    
    // Add loading states to buttons
    document.querySelectorAll('.cta-button').forEach(button => {
        button.addEventListener('click', function() {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                this.textContent = 'Loading...';
                
                // Reset after a delay (simulate loading)
                setTimeout(() => {
                    this.classList.remove('loading');
                    this.textContent = this.dataset.originalText || 'Get in touch';
                }, 2000);
            }
        });
        
        // Store original text
        button.dataset.originalText = button.textContent;
    });
    
    // Keyboard navigation support
    document.addEventListener('keydown', function(e) {
        // Escape key closes mobile menu
        if (e.key === 'Escape' && mobileMenuToggle && mainNavigation) {
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
            mainNavigation.setAttribute('aria-expanded', 'false');
            mobileMenuToggle.focus();
        }
    });
    
    // Performance optimization: Debounce scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Apply debouncing to scroll events
    const debouncedScrollHandler = debounce(function() {
        // Any additional scroll-based functionality can go here
    }, 10);
    
    window.addEventListener('scroll', debouncedScrollHandler);
    
});
