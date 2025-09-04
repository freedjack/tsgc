<?php
require_once 'config.php';

// Get current page info for SEO
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$page_title = isset($page_title) ? $page_title : SITE_NAME;
$page_description = isset($page_description) ? $page_description : SITE_DESCRIPTION;
$page_keywords = isset($page_keywords) ? $page_keywords : 'serious games, role play, simulations, training, immersive learning, corporate training, team building';

// Build a robust canonical URL from the current request URI (without query string)
$requestUri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
if ($requestUri === '/index.php' || $requestUri === '/') {
    $requestUri = '/';
}
$canonical_url = isset($canonical_url) ? $canonical_url : rtrim(SITE_URL, '/') . $requestUri;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/large/OnPodium.jpg">
    <meta property="og:image:alt" content="The Serious Games Company">
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/large/OnPodium.jpg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&family=Roboto+Slab:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="/assets/images/tsgc_logo.png" as="image">
    <link rel="preload" href="/assets/images/thumb/insta crowd.jpg" as="image">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>",
        "logo": "<?php echo SITE_URL; ?>/assets/images/tsgc_logo.png",
        "description": "<?php echo SITE_DESCRIPTION; ?>",
        "sameAs": ["<?php echo SITE_URL; ?>"]
    }
    </script>
</head>
<body>
    <!-- Skip to main content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Header -->
    <header class="site-header" id="site-header">
        <div class="header-content">
            <div class="logo-container">
                <a href="/" aria-label="Home - <?php echo SITE_NAME; ?>">
                    <img src="/assets/images/tsgc_logo.png" alt="<?php echo SITE_NAME; ?>" class="logo" width="200" height="60" decoding="async" fetchpriority="high">
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <button class="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="main-navigation">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
            
            <!-- Navigation -->
            <nav class="main-navigation" id="main-navigation" role="navigation" aria-label="Main navigation" aria-expanded="false">
                <ul class="nav-list">
                    <li><a href="/" <?php echo ($current_page === 'index') ? 'aria-current="page"' : ''; ?>>Home</a></li>
                    <li><a href="/training" <?php echo ($current_page === 'training') ? 'aria-current="page"' : ''; ?>>Training</a></li>
                    <li><a href="/knowledge" <?php echo ($current_page === 'knowledge') ? 'aria-current="page"' : ''; ?>>Insights</a></li>
                    <li><a href="/faq" <?php echo ($current_page === 'faq') ? 'aria-current="page"' : ''; ?>>FAQ</a></li>
                    <li><a href="/contact" <?php echo ($current_page === 'contact') ? 'aria-current="page"' : ''; ?>>Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Main content wrapper -->
    <main id="main-content" role="main">
