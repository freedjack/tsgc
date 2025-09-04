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
    <div class="hero" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('<?php echo htmlspecialchars($bgUrl); ?>');">
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($hero_title); ?></h1>
            <div class="hero-subtitle">
                <div class="primary-bg"><?php echo htmlspecialchars($hero_subtitle); ?></div>
            </div>
        </div>
    </div>
    
</div>

