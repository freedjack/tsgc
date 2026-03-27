<?php

// SEO settings for homepage
$page_title = 'Bespoke Roleplay Training UK | Corporate Performance';
$page_description = 'Experts in B2B performance training. We provide high-stakes rehearsal for leadership, medical simulation, and difficult conversations. Safety + Results.';
$page_keywords = 'bespoke roleplay training uk, corporate de-escalation workshops, medical simulation training, corporate role play, leadership training uk';

include __DIR__ . '/../../app/views/partials/header.php';

// Get front page training items
$front_page_training = getFrontPageTraining();

?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/Bomb-defuse-crowd.jpg';
$hero_title = 'Rehearse. Prepare. Play.';
$hero_subtitle = 'Develop skills for real world performance.';

include __DIR__ . '/../../app/views/partials/hero.php';
include __DIR__ . '/../../app/views/partials/trust-bar.php';
?>
<!-- Main Content -->
<div class="container">
    <div class="content-card">
        <div class="flex-container">
            <div class="text-content">
            <h2>Traditional training is static. The real world is dynamic. We use immersive theatre and live scenarios to train your team for the unscripted challenges ahead.</h2>
                <p>Wheter you want to build team confidence, train for a difficult conversation or just want to nail your next pitch, we can help you.</p>
                <p>Participants make mistakes privately, learn fast, and build instincts that hold when it matters. It’s playful, intense, and deeply human. Because the brain remembers experiences, not bullet points.</p>
            </div>
            <div class="video-container">
                <div class="video-facade"
                     data-vimeo-id="1084698269"
                     data-vimeo-hash="5974f89fd5"
                     role="button"
                     tabindex="0"
                     aria-label="Play video: The Serious Games Company">
                    <img class="video-facade-thumb" src="/assets/images/promo-facade.png" alt="" loading="lazy" decoding="async" width="640" height="360">
                    <div class="video-facade-content">
                        <svg class="video-facade-play" viewBox="0 0 68 48" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                            <path d="M66.5 7.7c-.8-2.9-2.5-5.4-5.4-6.2C55.8.1 34 0 34 0S12.2.1 6.9 1.5c-2.9.8-4.6 3.3-5.4 6.2C.1 13 0 24 0 24s.1 11 1.5 16.3c.8 2.9 2.5 5.4 5.4 6.2C12.2 47.9 34 48 34 48s21.8-.1 27.1-1.5c2.9-.8 4.6-3.3 5.4-6.2C67.9 35 68 24 68 24s-.1-11-1.5-16.3z" fill="var(--serious-color)"/>
                            <path d="M45 24L27 14v20" fill="#fff"/>
                        </svg>
                        <span class="video-facade-label">Watch our video</span>
                    </div>
                </div>
                <div class="video-facade-caption">A sizzle reel of our most theatrical training scenarios</div>
            </div>
                    
        </div>
        </div>
    </div>

</div>
        <!-- Serious Play Section -->
        <div class="container compact-section">
        <div class="content-grid">
            <div class="content-card image-card">
                <?php render_picture('assets/images/optimized/large/jpg/sg-meditation-live-and-let-dine-june-2024-celtic-manor-pb-30.jpg', 'People meditating in a training session', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
                <div class="content-card-content">
                <h2>Serious play.</h2>
                <div class="outcomes">
                <p>In the modern professional world, we often view "play" as the antithesis of "productivity." We equate maturity with rigidity and seriousness. However, neurobiology tells a different story. According to Stanford Professor Andrew Huberman, play is not a luxury; it is the "most powerful portal to neuroplasticity" available to the human brain throughout its entire lifespan.</p>
                </div>
                <div>
                    <a href="/knowledge/serious-games" class="cta-button">Read more about the research into the benefits of play</a>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
<!-- Training Scenarios Section -->
<div class="container">
    <div class="c-card">  
        <div class="header-flex">
            <h2 class="underline-text">Explore our Training Scenarios</h2>
            <a href="/training" class="view-all-link">View all training programs</a>
        </div>
    </div>
    
    <div class="service-grid">
        <?php foreach ($front_page_training as $index => $item): ?>
            <div class="service-card <?php echo ($index === count($front_page_training) && count($front_page_training) % 2 === 1) ? 'last-item' : ''; ?>">
                <?php if (isset($item['thumb'])): ?>
                    <a href="<?php echo htmlspecialchars($item['id']); ?>"><?php render_picture($item['thumb'], $item['title'], '', [ 'sizes' => '(min-width: 968px) 400px, 100vw' ]); ?></a>
                <?php endif; ?>
                
                <div class="content-card-content">
                    <h5><?php echo htmlspecialchars($item['strapline']); ?></h5>
                    <h3><a href="<?php echo htmlspecialchars($item['id']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></h3>
                    <div class="tag"><?php echo htmlspecialchars($item['subtitle']); ?></div>
                    
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


    <div class="content-grid">
        <div class="content-card image-card">
            <div class="content-card-content">
                <h2>Bespoke training scenarios</h2>
                <h3>Because no two organisations are the same</h3>
                <?php render_picture('assets/images/optimized/large/jpg/SCIENTISTS.jpg', 'Scientists walking in a row', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
                <div class="content-card-content">
                    <div class="outcomes">
                        <p>Work with us to construct and curate training scenarios that are tailored to your organisation and your needs.</p>
                        <h4>Partner with us..?</h4>
                        <p>You've made it this far, perhaps you would like to help us develop our latest training scenario?</p>
                        <p><a href="/contact" class="btn-primary">Find out more</a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-card image-card">
            <div class="content-card-content">
            <h2>What else can we do?</h2>
            <h3>It's more than just training</h3>
            <?php render_picture('assets/images/optimized/thumb/jpg/owen-live-and-let-dine.jpg', 'A man wearing a red hat with a microphone', '', [ 'sizes' => '(min-width: 968px) 400px, 100vw' ]); ?>
            <div class="content-card-content">
            <div class="outcomes">
                <p>Role play, simulations and games are great for learning new skills and behaviours</p>
                <p>But they can also be used to improve existing skills and behaviours as well as building confidence and social skills.</p>
                <h4>We can help you with</h4>
                <ul class="no-bullets">
                    <li>➜ Emotional Intelligence</li>
                    <li>➜ Wellbeing and resilience</li>
                    <li>➜ Communication</li>
                    <li>➜ Leadership</li>
                    <li>➜ Critical thinking</li>
                    <li>➜ Imagination</li>
                    <li>➜ Empathy</li>
                    <li>➜ Creativity</li>
                    <li>➜ Level up your pitching</li>
                    <li>➜ Collaboration</li>

                </ul>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
