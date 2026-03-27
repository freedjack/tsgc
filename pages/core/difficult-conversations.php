<?php
// SEO settings
$page_title = 'Difficult Conversations Training | Conflict Resolution';
$page_description = 'Master the art of high-stakes conversations. Practical training for performance reviews, conflict resolution, and delivering feedback.';
$page_keywords = 'difficult conversations, conflict resolution, management training, feedback training, role play';

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg'; 
$hero_title = 'Difficult Conversations';
$hero_subtitle = 'Master the conversations you’ve been avoiding';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Introduction -->
<div class="container">
    <div class="content-card">
        <div class="text-content">
            <h2>Silence is Expensive</h2>
            <p>Unresolved conflict, delayed feedback, and avoided conversations cost businesses millions in lost productivity and turnover. We replace anxiety with competence.</p>
            <p>We don't teach you a script. We teach you how to read the room, manage your own physiology, and navigate emotional turbulence without losing potential.</p>
        </div>
    </div>
</div>

<!-- Our Method Include -->
<?php include __DIR__ . '/../../app/views/partials/method-section.php'; ?>

<!-- Scenarios -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>Common Scenarios</h2>
            <div class="outcomes">
                <ul>
                    <li><strong>Performance Management:</strong> Telling a high-performer they are toxic to the team.</li>
                    <li><strong>Restructuring:</strong> Delivering redundancy news with dignity.</li>
                    <li><strong>Conflict Resolution:</strong> Mediating between warring departments.</li>
                    <li><strong>Client Issues:</strong> Resetting expectations with a dissatisfied key account.</li>
                </ul>
            </div>
        </div>
        
        <div class="content-card image-card">
             <?php render_picture('assets/images/optimized/large/jpg/sam-mcghee-studio.jpg', 'Two people in a serious discussion', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
            <div class="content-card-content">
                <h2>The Outcome</h2>
                <p>After a session with us, your leaders won't just "know" what to do—they will have done it. They will walk away with the muscle memory to handle the heat.</p>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA -->
<?php include __DIR__ . '/../../app/views/partials/cta-contact.php'; ?>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
