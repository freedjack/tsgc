<?php
require_once 'config.php';

// SEO settings for training page
$page_title = 'Training Programs | ' . SITE_NAME;
$page_description = 'Explore our immersive training programs including cyber security, live TV production, covert operations, and crisis management scenarios.';
$page_keywords = 'training programs, cyber security training, live TV training, covert operations, crisis management, immersive learning';
// Let header compute canonical based on request URI

include 'includes/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/large/room-with-tables.jpg';
$hero_title = 'Training Programs';
$hero_subtitle = 'Immersive role-play scenarios that transform learning';
include 'includes/hero.php';
?>

<!-- Training Programs Grid -->
<div class="container">
    <div class="content-grid">
        <?php foreach ($content_items as $item): ?>
            <div class="content-card image-card">
                <?php if (isset($item['thumb'])): ?>
                    <?php render_picture($item['thumb'], $item['title'], '', [ 'sizes' => '(min-width: 968px) 400px, 100vw' ]); ?>
                <?php endif; ?>
                
                <div class="content-card-content">
                    <h2><?php echo htmlspecialchars($item['title']); ?></h2>
                    <h3><?php echo htmlspecialchars($item['subtitle']); ?></h3>
                    
                    <p><?php echo htmlspecialchars($item['body']); ?></p>
                    
                    <?php if (isset($item['outcomes']) && !empty($item['outcomes'])): ?>
                        <div class="outcomes">
                            <h4>Learning Outcomes</h4>  
                            <ul>
                                <?php foreach ($item['outcomes'] as $outcome): ?>
                                    <li><?php echo htmlspecialchars($outcome); ?></li>      
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex-spacer"></div>
                    <a href="<?php echo htmlspecialchars($item['id']); ?>.php" class="cta-button">
                        Learn More
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Bespoke Training Section -->
<div class="content-card container">
    <div class="flex-container">
        <div class="text-content">
            <h2>Bespoke Training Solutions</h2>
            <p>Every organization is unique, and so are your training needs. We work closely with you to design custom training scenarios that address your specific challenges and objectives.</p>
            
            <h3>Our Custom Training Process</h3>
            <ol>
                <li><strong>Discovery:</strong> We learn about your organization, culture, and specific training goals</li>
                <li><strong>Design:</strong> We create a tailored training scenario that addresses your needs</li>
                <li><strong>Development:</strong> We build the immersive experience with your input</li>
                <li><strong>Delivery:</strong> We facilitate the training session with your team</li>
                <li><strong>Debrief:</strong> We provide insights and recommendations for ongoing development</li>
            </ol>
            
            <p><a href="contact.php" class="cta-button">Discuss Your Training Needs</a></p>
        </div>
        
        <div class="image-container">
            <?php render_picture('assets/images/large/SCIENTISTS.jpg', 'Scientists collaborating in a training scenario', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
        </div>
    </div>
</div>

<!-- Training Benefits Section -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>Why Choose Immersive Training?</h2>
            <div class="outcomes">
                <div><strong>Active Learning:</strong> Participants learn by doing, not just listening</div>
                <div><strong>Safe Environment:</strong> Practice skills without real-world consequences</div>
                <div><strong>Immediate Feedback:</strong> Learn from mistakes in real-time</div>
                <div><strong>Team Building:</strong> Strengthen relationships through shared experiences</div>
                <div><strong>Memorable:</strong> Engaging experiences that stick with participants</div>
                <div><strong>Measurable:</strong> Clear outcomes and observable skill development</div>
            </div>
        </div>
        
        <div class="content-card">
            <h2>Training Formats</h2>
            <div class="outcomes">
                <div><strong>Half-Day Sessions:</strong> Intensive focused training</div>
                <div><strong>Full-Day Programs:</strong> Comprehensive skill development</div>
                <div><strong>Multi-Day Workshops:</strong> Deep dive into complex scenarios</div>
                <div><strong>Team Building Events:</strong> Fun, engaging group activities</div>
                <div><strong>Leadership Development:</strong> Executive-level training programs</div>
                <div><strong>Custom Programs:</strong> Tailored to your specific needs</div>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA Section -->
<div class="content-card container">
    <div class="text-content" style="text-align: center;">
        <h2>Ready to Transform Your Training?</h2>
        <p>Contact us to discuss how our immersive training programs can benefit your organization.</p>
        <p>
            <a href="contact.php" class="cta-button">Get Started</a>
            <a href="index.php" class="cta-button dt-l-m">Back to Home</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
