<?php

// SEO settings for training page
$page_title = 'Corporate Training Workshops | Immersive Scenarios';
$page_description = 'Explore our practical training scenarios: Cyber Security, Crisis Management (The Situation Room), and Covert Operations leadership training.';
$page_keywords = 'corporate training workshops, immersive training scenarios, cyber security role play, crisis management training';
// Let header compute canonical based on request URI

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Training Programs';
$hero_subtitle = 'Immersive role-play scenarios that transform learning';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Training Programs Grid -->
<div class="container">
    <div class="service-grid">
        <?php foreach ($content_items as $index => $item): ?>
            <div class="service-card <?php echo ($index === count($content_items) - 1 && count($content_items) % 2 === 1) ? 'last-item' : ''; ?>">
                <?php if (isset($item['thumb'])): ?>
                    <a href="<?php echo htmlspecialchars($item['id']); ?>"><?php render_picture($item['thumb'], $item['title'], '', [ 'sizes' => '(min-width: 968px) 400px, 100vw' ]); ?></a>
                <?php endif; ?>
                
                <div class="content-card-content">
                    <?php if (isset($item['strapline'])): ?>
                        <h5><?php echo htmlspecialchars($item['strapline']); ?></h5>
                    <?php endif; ?>
                    <h3><a href="<?php echo htmlspecialchars($item['id']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></h3>
                    <div class="tag"><?php echo htmlspecialchars($item['subtitle'] ?? ''); ?></div>
                    
                    <?php if (isset($item['outcomes']) && !empty($item['outcomes'])): ?>
                        <div class="outcomes">
                            <h4>Outcomes</h4>  
                            <?php foreach ($item['outcomes'] as $outcome): ?>
                                <div><?php echo htmlspecialchars($outcome); ?></div>      
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex-spacer"></div>
                    <a href="<?php echo htmlspecialchars($item['id']); ?>" class="btn-primary" style="margin-top: 1rem;">
                        Find out more
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
            
            <p><a href="/contact" class="cta-button">Discuss Your Training Needs</a></p>
        </div>
        
        <div class="image-container">
            <?php render_picture('assets/images/optimized/large/jpg/SCIENTISTS.jpg', 'Scientists collaborating in a training scenario', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
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
            <a href="/contact" class="cta-button">Get Started</a>
            <a href="/" class="cta-button dt-l-m">Back to Home</a>
        </p>
    </div>
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
