<?php

// SEO settings for knowledge page
$page_title = 'Knowledge & Insights';
$page_description = 'Explore our insights on immersive training, scenario design, and facilitation techniques. Learn from our experience in creating effective learning experiences.';
$page_keywords = 'immersive training, scenario design, facilitation tips, learning insights, training knowledge, serious games insights';
$canonical_url =  '/knowledge';

include __DIR__ . '/../includes/header.php';
?>

<!-- Hero Section -->
 
<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Knowledge & Insights';
$hero_subtitle = 'Expert insights on immersive training and learning design';
include __DIR__ . '/../includes/hero.php';
?>

<!-- Knowledge Articles Grid -->
<div class="container">
    <div class="content-grid">
        
        <div class="content-card">
            <h2>Benefits of role play</h2>
            <p>The benefits of role play and how it can be used to improve skills and team building.</p>
            <p><strong>Key Topics:</strong> Role play, immersive training, skill development, team building</p>
            <a href="/knowledge/benefits-of-role-play" class="cta-button">Read Article</a>
        </div>
        <div class="content-card">
            <h2>What is Immersive Training?</h2>
            <p>Discover the fundamentals of immersive training and why it's so effective for skill development and team building.</p>
            <p><strong>Key Topics:</strong> Learning by doing, experiential learning, role-play benefits</p>
            <a href="/knowledge/what-is-immersive-training" class="cta-button">Read Article</a>
        </div>

        <div class="content-card">
            <h2>Designing Effective Scenarios</h2>
            <p>Learn the art and science of creating engaging training scenarios that maximize learning outcomes.</p>
            <p><strong>Key Topics:</strong> Scenario design principles, engagement techniques, learning objectives</p>
            <a href="/knowledge/designing-effective-scenarios" class="cta-button">Read Article</a>
        </div>
    </div>
</div>

<!-- About Our Knowledge Section -->
<div class="content-card container">
    <div class="flex-container">
        <div class="text-content">
            <h2>Why Our Insights Matter</h2>
            <p>At The Serious Games Company, we've spent years perfecting the art of immersive training. Our knowledge base represents the collective wisdom gained from hundreds of training sessions across diverse industries.</p>
            
            <h3>What You'll Learn</h3>
            <ul>
                <li><strong>Practical Techniques:</strong> Real-world strategies you can implement immediately</li>
                <li><strong>Evidence-Based Approaches:</strong> Methods backed by learning science and our experience</li>
                <li><strong>Industry Best Practices:</strong> Insights from corporate training and development</li>
                <li><strong>Common Pitfalls:</strong> What to avoid when designing immersive experiences</li>
            </ul>
            
            <p>Whether you're new to immersive training or looking to enhance your existing programs, our insights will help you create more effective learning experiences.</p>
        </div>
        
        <div class="image-container">
            <?php render_picture('assets/images/optimized/large/jpg/OnPodium.jpg', 'Training facilitator leading a session', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="container">
    <div class="content-card">
        <h2>Ready to Apply These Insights?</h2>
        <p>Knowledge is power, but application is transformation. Let us help you implement these insights in your organization.</p>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2rem;">
            <a href="/training" class="cta-button">Explore Training Programs</a>
            <a href="/contact" class="cta-button">Discuss Your Needs</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>


