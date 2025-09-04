<?php
require_once 'config.php';

// Get content for this specific training program
$content = getContentById('live-in-the-morning');

if (!$content) {
    header('Location: training.php');
    exit;
}

// SEO settings for this page
$page_title = $content['title'] . ' | ' . SITE_NAME;
$page_description = $content['subtitle'] . ' ' . $content['body'];
$page_keywords = 'training, immersive learning, role play, corporate training, ' . strtolower(str_replace(' ', '-', $content['title']));
// Let header compute canonical based on request URI

include 'includes/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = $content['image'];
$hero_title = $content['title'];
$hero_subtitle = $content['subtitle'];
include 'includes/hero.php';
?>

<!-- Main Content -->
<div class="container">
    <div class="content-card">
        <div class="flex-container">
            <div class="text-content">
                <h2>About This Training</h2>
                <p><?php echo htmlspecialchars($content['body']); ?></p>
            </div>
            
            <div class="image-container">
                <?php render_picture($content['image'], $content['title'], '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
            </div>
        </div>
    </div>
</div>

<!-- Learning Outcomes -->
<div class="container">
    <div class="content-card">
        <h2>Learning Outcomes</h2>
        <div class="content-grid">
            <?php foreach ($content['outcomes'] as $outcome): ?>
                <div class="outcome-item">
                    <h3><?php echo htmlspecialchars($outcome); ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Training Details -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>Training Format</h2>
            <div class="outcomes">
                <div><strong>Duration:</strong> Half-day to full-day sessions</div>
                <div><strong>Group Size:</strong> 6-20 participants</div>
                <div><strong>Format:</strong> Immersive role-play simulation</div>
                <div><strong>Location:</strong> Your premises or our facilities</div>
            </div>
        </div>
        
        <div class="content-card">
            <h2>Who Should Attend</h2>
            <div class="outcomes">
                <div>Teams looking to improve skills</div>
                <div>Management & Leadership</div>
                <div>Anyone interested in immersive learning</div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="content-card container">
    <div class="text-content" style="text-align: center;">
        <h2>Ready to Experience This Training?</h2>
        <p>Transform your team through immersive, hands-on learning.</p>
        <p>
            <a href="contact.php?training=live-in-the-morning" class="cta-button">Book This Training</a>
            <a href="training.php" class="cta-button dt-l-m">View All Programs</a>
        </p>
    </div>
</div>

<!-- Additional CSS for this page -->
<style>
.outcome-item {
    background: var(--background-color);
    padding: 1.5rem;
    border-radius: 8px;
    border-left: 4px solid var(--accent-color);
}

.outcome-item h3 {
    margin: 0;
    color: var(--primary-color);
    font-size: 1.1rem;
}
</style>

<?php include 'includes/footer.php'; ?>