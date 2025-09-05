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
    
    // Theme Switcher Functionality
    initializeThemeSwitcher();
});

// Theme Management System
class ThemeManager {
    constructor() {
        this.themes = {
            'modern-professional': 'Modern Professional',
            'ocean-breeze': 'Ocean Breeze',
            'sunset-vibes': 'Sunset Vibes',
            'forest-fresh': 'Forest Fresh',
            'purple-dreams': 'Purple Dreams',
            'midnight-elegance': 'Midnight Elegance'
        };
        
        this.currentTheme = this.getStoredTheme() || 'modern-professional';
        this.init();
    }
    
    init() {
        this.applyTheme(this.currentTheme);
        this.createThemeSwitcher();
        this.bindEvents();
    }
    
    getStoredTheme() {
        try {
            return localStorage.getItem('tsgc-theme');
        } catch (e) {
            return null;
        }
    }
    
    storeTheme(theme) {
        try {
            localStorage.setItem('tsgc-theme', theme);
        } catch (e) {
            console.warn('Could not store theme preference');
        }
    }
    
    applyTheme(themeName) {
        if (!this.themes[themeName]) {
            console.warn(`Theme "${themeName}" not found`);
            return;
        }
        
        // Remove existing theme classes
        document.documentElement.removeAttribute('data-theme');
        
        // Apply new theme
        if (themeName !== 'modern-professional') {
            document.documentElement.setAttribute('data-theme', themeName);
        }
        
        this.currentTheme = themeName;
        this.storeTheme(themeName);
        
        // Update theme switcher UI
        this.updateThemeSwitcherUI();
        
        // Announce theme change for accessibility
        this.announceThemeChange(themeName);
    }
    
    createThemeSwitcher() {
        // Check if theme switcher already exists
        if (document.querySelector('.theme-switcher')) {
            return;
        }
        
        const themeSwitcher = document.createElement('div');
        themeSwitcher.className = 'theme-switcher';
        themeSwitcher.setAttribute('role', 'region');
        themeSwitcher.setAttribute('aria-label', 'Theme selector');
        
        themeSwitcher.innerHTML = `
            <h4>Theme</h4>
            <div class="theme-options" role="radiogroup" aria-label="Choose a color theme">
                ${Object.entries(this.themes).map(([key, name]) => `
                    <div class="theme-option" 
                         data-theme="${key}" 
                         role="radio" 
                         aria-checked="${key === this.currentTheme}"
                         tabindex="${key === this.currentTheme ? '0' : '-1'}"
                         aria-label="Switch to ${name} theme">
                        <div class="theme-preview" data-theme="${key}"></div>
                        <span class="theme-name">${name}</span>
                    </div>
                `).join('')}
            </div>
        `;
        
        document.body.appendChild(themeSwitcher);
    }
    
    updateThemeSwitcherUI() {
        const themeOptions = document.querySelectorAll('.theme-option');
        themeOptions.forEach(option => {
            const themeName = option.dataset.theme;
            const isActive = themeName === this.currentTheme;
            
            option.setAttribute('aria-checked', isActive);
            option.classList.toggle('active', isActive);
            option.setAttribute('tabindex', isActive ? '0' : '-1');
        });
    }
    
    bindEvents() {
        document.addEventListener('click', (e) => {
            const themeOption = e.target.closest('.theme-option');
            if (themeOption) {
                const themeName = themeOption.dataset.theme;
                this.applyTheme(themeName);
            }
        });
        
        // Keyboard navigation for theme switcher
        document.addEventListener('keydown', (e) => {
            const themeSwitcher = document.querySelector('.theme-switcher');
            if (!themeSwitcher || !themeSwitcher.contains(e.target)) {
                return;
            }
            
            const themeOptions = Array.from(document.querySelectorAll('.theme-option'));
            const currentIndex = themeOptions.indexOf(e.target);
            
            switch (e.key) {
                case 'ArrowDown':
                case 'ArrowRight':
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % themeOptions.length;
                    themeOptions[nextIndex].focus();
                    break;
                    
                case 'ArrowUp':
                case 'ArrowLeft':
                    e.preventDefault();
                    const prevIndex = currentIndex === 0 ? themeOptions.length - 1 : currentIndex - 1;
                    themeOptions[prevIndex].focus();
                    break;
                    
                case 'Enter':
                case ' ':
                    e.preventDefault();
                    this.applyTheme(e.target.dataset.theme);
                    break;
            }
        });
    }
    
    announceThemeChange(themeName) {
        const announcement = document.createElement('div');
        announcement.setAttribute('aria-live', 'polite');
        announcement.setAttribute('aria-atomic', 'true');
        announcement.className = 'sr-only';
        announcement.textContent = `Theme changed to ${this.themes[themeName]}`;
        
        document.body.appendChild(announcement);
        
        // Remove announcement after screen readers have processed it
        setTimeout(() => {
            document.body.removeChild(announcement);
        }, 1000);
    }
    
    // Public method to get current theme
    getCurrentTheme() {
        return this.currentTheme;
    }
    
    // Public method to get theme name
    getThemeName(themeKey) {
        return this.themes[themeKey] || themeKey;
    }
}

// Initialize theme manager
let themeManager;

function initializeThemeSwitcher() {
    themeManager = new ThemeManager();
}

// Export for potential external use
window.TSGCThemeManager = ThemeManager;
