<?php

require_once __DIR__ . '/../../bootstrap/bootstrap.php';

// Site name constant
define('SITE_NAME', 'The Serious Games Company');

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
    <?php
    // Set page variables for SEO include
    $pageTitle = $page_title;
    $pageDescription = $page_description;
    $canonicalUrl = $canonical_url;
    $ogImage = SITE_URL . '/assets/images/large/OnPodium.jpg';
    include __DIR__ . '/seo.php';
    ?>
    
    <meta name="theme-color" content="#ffffff">

    <?php
    $cssPath = __DIR__ . '/../../../assets/css/style.css';
    $jsPath  = __DIR__ . '/../../../assets/js/main.js';
    $cssVer  = file_exists($cssPath) ? filemtime($cssPath) : '';
    $jsVer   = file_exists($jsPath) ? filemtime($jsPath) : '';
    ?>

    <!-- Critical CSS + @font-face inlined (no extra render-blocking stylesheet for fonts) -->
    <style><?php
        readfile(__DIR__ . '/../../../assets/css/critical.css');
        readfile(__DIR__ . '/../../../assets/css/fonts.css');
    ?></style>

    <!-- Self-hosted fonts: preload woff2 (starts early; faces defined in inline CSS above) -->
    <link rel="preload" href="/assets/fonts/inter-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/fonts/montserrat-latin.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Full stylesheet: preloaded then swapped to non-blocking -->
    <link rel="preload" href="/assets/css/style.css?v=<?php echo $cssVer; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/assets/css/style.css?v=<?php echo $cssVer; ?>"></noscript>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">

    <!-- Preload hero image if set by the page -->
    <?php if (isset($hero_image)): ?>
    <link rel="preload" href="/<?php echo ltrim($hero_image, '/'); ?>" as="image" fetchpriority="high">
    <?php endif; ?>

    <!-- Analytics -->
    <?php include __DIR__ . '/analytics.php'; ?>
</head>
<body >
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
                <ul class="nav-links">
                    <li><a href="/" <?php echo ($current_page === 'index') ? 'aria-current="page"' : ''; ?>>Home</a></li>
                    <li><a href="/training" <?php echo ($current_page === 'training') ? 'aria-current="page"' : ''; ?>>Training Scenarios</a></li>
                    <li><a href="/public-speaking" <?php echo ($current_page === 'public-speaking') ? 'aria-current="page"' : ''; ?>>Public Speaking</a></li>
                    <li><a href="/knowledge" <?php echo ($current_page === 'knowledge') ? 'aria-current="page"' : ''; ?>>Knowledge</a></li>
                    <li><a href="/faq" <?php echo ($current_page === 'faq') ? 'aria-current="page"' : ''; ?>>FAQ</a></li>
                    <li><a href="/contact" <?php echo ($current_page === 'contact') ? 'aria-current="page"' : ''; ?>>Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Main content wrapper -->
    <main id="main-content" role="main">
