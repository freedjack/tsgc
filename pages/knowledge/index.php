<?php

// SEO settings for knowledge page
$page_title = 'Knowledge & Insights';
$page_description = 'Explore our insights on immersive training, scenario design, and facilitation techniques. Learn from our experience in creating effective learning experiences.';
$page_keywords = 'immersive training, scenario design, facilitation tips, learning insights, training knowledge, serious games insights';

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
 
<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Knowledge & Insights';
$hero_subtitle = 'Expert insights on immersive training and learning design';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Knowledge Articles Grid -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2><a href="/knowledge/roleplay-benefits">The Science of Play—Why Your Career Depends on It</a></h2>
            <p>Unlock your brain's "play" mode. Science shows the most successful tinkerers, creatives, and leaders never stopped playing. Play rewires your prefrontal cortex for better decision-making, creativity, and emotional intelligence.</p>
            <p><strong>Key Topics:</strong> Neuroplasticity, play, leadership, cognitive flexibility, Huberman Lab</p>
            <a href="/knowledge/roleplay-benefits" class="cta-button">Read Article</a>
        </div>
  
        <div class="content-card">
            <h2><a href="/knowledge/benefits-of-role-play">Benefits of role play</a></h2>
            <p>The benefits of role play and how it can be used to improve skills and team building.</p>
            <p><strong>Key Topics:</strong> Role play, immersive training, skill development, team building</p>
            <a href="/knowledge/benefits-of-role-play" class="cta-button">Read Article</a>
        </div>

        <div class="content-card">
            <h2><a href="/knowledge/the-playbook">The Behavioral Playbook</a></h2>
            <p>Books, podcasts, and research behind our methodology—behavioral science, stress and play, and high-stakes communication.</p>
            <p><strong>Key Topics:</strong> Behavioral economics, neuroplasticity, negotiation, learning science</p>
            <a href="/knowledge/the-playbook" class="cta-button">Explore the playbook</a>
        </div>
  
    </div>
</div>

<!-- About Our Knowledge Section -->
<div class="content-card container">
    <div class="flex-container">
        <div class="text-content">
            <h2>Why Our Insights Matter</h2>
            <p>At The Serious Games Company, we've seen how immersive theatrical role play can transform teams and individuals. 
            Our knowledge base represents the collective wisdom gained from our time playing games, role playing and expreimenting.</p>
            
            <h3>What You'll Learn</h3>
            <ul>
                <li><strong>Practical Techniques:</strong> Real-world strategies you can implement immediately</li>
                <li><strong>Evidence-Based Approaches:</strong> Methods backed by learning science and our experience</li>
                <li><strong>Common Pitfalls:</strong> What to avoid when designing immersive experiences</li>
            </ul>
            
            <p>Whether you're new to immersive training or looking to enhance your existing programs, our insights will help you create more effective learning experiences.</p>
        </div>
        
        <div class="image-container">
            <?php render_picture('/assets/images/optimized/large/jpg/OnPodium.jpg', 'Training facilitator leading a session', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="container">
    <div class="content-card">
        <h2>Ready to Apply These Insights?</h2>
        <p>Knowledge is power, but application is transformation. Let us help you implement these insights in your organization.</p>
        <div>
            <a href="/training" class="cta-button">Explore Training Programs</a>
            <a href="/contact" class="cta-button dt-l-m">Contact us</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>


