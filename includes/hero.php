<?php
// Expected vars: $hero_image, $hero_title, $hero_subtitle
if (!isset($hero_image, $hero_title, $hero_subtitle)) {
    return;
}

// Ensure absolute URL path for background image
$bgUrl = $hero_image;
if (strpos($bgUrl, 'http://') !== 0 && strpos($bgUrl, 'https://') !== 0) {
    $bgUrl = '/' . ltrim($bgUrl, '/');
}
?>
<div class="hero-container">
    <div class="hero">
        <!-- Hero background image with high priority -->
        <img src="<?php echo htmlspecialchars($bgUrl); ?>" 
             alt="<?php echo htmlspecialchars($hero_title); ?>" 
             class="hero-bg-image" 
             fetchpriority="high" 
             loading="eager" 
             decoding="sync">
        
        <!-- Gradient overlay -->
        <div class="hero-overlay"></div>
        
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($hero_title); ?></h1>
            <div class="hero-subtitle">
                <h2><?php echo htmlspecialchars($hero_subtitle); ?></h2>
            </div>
        </div>
    </div>
    
</div>

