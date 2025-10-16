# The Serious Games Company - PHP/HTML Version

This is a PHP/HTML version of The Serious Games Company website, optimized for SEO and accessibility.

## Features

- **SEO Optimized**: Meta tags, structured data, semantic HTML
- **Accessibility**: WCAG compliant with proper ARIA labels, keyboard navigation
- **Responsive Design**: Mobile-first approach with responsive breakpoints
- **Shared Components**: Header and footer included on all pages
- **Easy Content Management**: Content stored in PHP arrays for easy updates
- **Form Processing**: Contact form with validation and processing
- **Performance Optimized**: Optimized CSS, JavaScript, and image loading

## File Structure

```
tsgc/
├── config.php                 # Site configuration and content data
├── index.php                  # Homepage
├── training.php               # Training programs overview
├── contact.php                # Contact page with form
├── the-hack.php              # Individual training program page
├── live-in-the-morning.php   # Individual training program page
├── covert-operations-training-academy.php # Individual training program page
├── the-situation-room.php    # Individual training program page
├── generate-pages.php        # Script to generate training program pages
├── includes/
│   ├── header.php            # Shared header component
│   └── footer.php            # Shared footer component
├── assets/
│   ├── css/
│   │   └── style.css         # Main stylesheet
│   ├── js/
│   │   └── main.js           # Main JavaScript file
│   └── images/
│       ├── large/            # Large images for hero sections
│       ├── thumb/            # Thumbnail images for cards
│       └── tsgc_logo.png     # Company logo
└── README.md                 # This file
```

## How to Add a New Page

### 1. Add Content to config.php

Add your new training program to the `$content_items` array in `config.php`:

```php
[
    'id' => 'your-new-program',
    'title' => 'Your New Program',
    'subtitle' => 'Brief description of the program',
    'body' => 'Detailed description of the training program...',
    'image' => '/images/large/your-image.jpg',
    'thumb' => '/images/thumb/your-thumbnail.jpg',
    'outcomes' => [
        'Outcome 1',
        'Outcome 2',
        'Outcome 3'
    ]
]
```

### 2. Generate the Page

Run the generation script to create the new page:

```bash
php generate-pages.php
```

Or manually create a new PHP file following the template structure.

### 3. Update Navigation

The navigation is automatically generated based on the content in `config.php`, so new pages will appear automatically.

## SEO Features

- **Meta Tags**: Title, description, keywords for each page
- **Open Graph**: Social media sharing optimization
- **Twitter Cards**: Twitter-specific meta tags
- **Structured Data**: JSON-LD schema markup
- **Canonical URLs**: Prevent duplicate content issues
- **Semantic HTML**: Proper heading hierarchy and semantic elements

## Accessibility Features

- **Skip Links**: Keyboard users can skip to main content
- **ARIA Labels**: Proper labeling for screen readers
- **Focus Management**: Visible focus indicators
- **Keyboard Navigation**: Full keyboard accessibility
- **Alt Text**: Descriptive alt text for all images
- **Color Contrast**: WCAG AA compliant color combinations

## Performance Optimizations

- **CSS Optimization**: Minified and optimized stylesheets
- **JavaScript Optimization**: Debounced scroll events, efficient DOM queries
- **Image Optimization**: Proper sizing and lazy loading support
- **Resource Preloading**: Critical resources preloaded
- **Mobile Optimization**: Touch-friendly interface elements

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Setup Instructions

1. **Upload Files**: Upload all files to your web server
2. **Configure**: Update `config.php` with your site information
3. **Images**: Ensure all image paths are correct
4. **Permissions**: Set appropriate file permissions (644 for files, 755 for directories)
5. **Test**: Test all pages and forms

## Customization

### Colors
Update the CSS custom properties in `assets/css/style.css`:

```css
:root {
  --primary-color: #000000;
  --secondary-color: #EE4E4E;
  --accent-color: #3185fc;
  /* ... other colors */
}
```

### Fonts
The site uses Google Fonts:
- **Primary Font**: Inter (for body text and general content)
- **Secondary Font**: Roboto Slab (for headings and emphasis)

Fonts are loaded via Google Fonts CDN with proper preconnect optimization for performance.

### Content
Edit the `$content_items` array in `config.php` to update training programs.

### Styling
Modify `assets/css/style.css` to customize the appearance.

### Images
All images are stored in the `assets/images/` directory:
- `assets/images/large/` - High-resolution images for hero sections and content
- `assets/images/thumb/` - Thumbnail images for cards and previews
- `assets/images/tsgc_logo.png` - Company logo
- `assets/images/room-with-tables.jpg` - Alternative hero background

**Hero Images:**
- Homepage: `assets/images/thumb/insta crowd.jpg` (matches original site)
- Training page: `assets/images/large/room-with-tables.jpg`
- Contact page: `assets/images/large/andrey-metelev-games.jpg`
- Individual training pages: Use images from `config.php` content array

When adding new images:
1. Place large images in `assets/images/large/`
2. Place thumbnails in `assets/images/thumb/`
3. Update the image paths in `config.php` for training programs
4. Update any hardcoded image paths in PHP files

## Form Processing

The contact form (`contact.php`) uses Web3Forms for form submission. The form is handled entirely by JavaScript and submitted to Web3Forms API.

The form uses Web3Forms API for submission, which handles:
- Email delivery
- Spam protection
- Form validation
- Success/error responses

## Maintenance

- **Regular Updates**: Keep PHP and dependencies updated
- **Content Updates**: Update training programs in `config.php`
- **Image Optimization**: Optimize new images before uploading
- **Performance Monitoring**: Monitor page load times and optimize as needed

## Support

For questions or issues, please refer to the original Vue.js version or contact the development team.

## License

This project is based on The Serious Games Company website and follows the same licensing terms.
