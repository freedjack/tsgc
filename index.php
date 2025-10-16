<?php

// SEO settings for homepage
$page_title = 'Immersive Role Play and Training';
$page_description = 'The Serious Games Company creates engaging, immersive role play, simulations and games for effective learning and skill development in corporate environments.';
$page_keywords = 'serious games, role play, simulations, training, immersive learning, corporate training, team building, learning by being';

include 'includes/header.php';

// Get front page training items
$front_page_training = getFrontPageTraining();

?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/Bomb-defuse-crowd.jpg';
$hero_title = 'Smart Play';
$hero_subtitle = "Immersive theatrical roleplay for the real world learning.";
include 'includes/hero.php';
?>

<!-- About Section -->
<div class="content-card container">
    <div class="flex-container">  
        <div class="text-content">      
            <h2>Whats this all about?</h2>
            <div class="video-text-layout">
            <div class="video-container">
            <iframe title="vimeo-player" src="https://player.vimeo.com/video/1084698269?h=5974f89fd5" width="640" height="360" frameborder="0" referrerpolicy="strict-origin-when-cross-origin" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"   allowfullscreen></iframe>

            </div>
                <div class="text-content-right">
                    <p>We are the Serious Games Company. <strong>We use role play, simulations and games to unlock your team's potential.</strong></p>
                    <p>Perhaps you're the head of HR at a large corporation, or maybe you run your own company. Either way, you understand the value of a competent, adaptable, and happy team.</p>
                    <p>We believe learning should be more than just informative. It should be exciting and fun. Invest in your team through engaging, immersive role play, games, and scenarios. and make training an experience that inspires and empowers.</p>
                    <p>Because training shouldn't be boring—it should be legendary.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Us Section -->
<div class="container">
    <div class="content-grid">
        <div class="content-card image-card">
            <?php render_picture('assets/images/optimized/large/jpg/sg-meditation-live-and-let-dine-june-2024-celtic-manor-pb-30.jpg', 'People meditating in a training session', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
            <div class="content-card-content">
            <h2>You should contact us if you want to</h2>
            <ul>
                <li>Develop mindsets, not just skills—because growth should be exciting</li>
                <li>Improve communication and build stronger connections</li>
                <li>Tackle challenges with creativity and confidence</li>
                <li>Create training that's dynamic, engaging, and memorable</li>
                <li>Make learning an experience your team will genuinely enjoy</li>
                <li>Train in a safe and supportive environment</li>
                <li>Be ready for anything with adaptive thinking and problem-solving</li>
                <li>Embrace the power of face-to-face human interaction</li>
                <li>Build confidence, sharpen social skills, and have a great time doing it</li>
            </ul>
            <div>
                <a href="/contact" class="cta-button" style="width: 90%; display: block; text-align: center;">Get in touch</a>
            </div>
            </div>
        </div>
        
        <div class="content-card image-card">
            <?php render_picture('assets/images/optimized/large/jpg/laugh-live-and-let-dine-june-2024-celtic-manor-pb-25.jpg', 'People laughing during a training session', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
            <div class="content-card-content">
            <h2>We're probably not for you if..</h2>
            <ul>
                <li>You want a powerpoint presentation</li>
                <li>You want an online test</li>
                <li>You want a certificate</li>
                <li>You want to do a lot of sitting down</li>
                <li>You want to wear a name badge</li>
                <li>You think this all sounds a bit silly</li>
            </ul>
            <a href="https://www.microsoft.com/en-us/learning/default.aspx" target="_blank" rel="noopener noreferrer">
                Go to Microsoft Learning
            </a>
            </div>
        </div>
    </div>
</div>

<!-- About Serious Games Section -->
<div class="content-card">  
    <div class="container">
        <h2>About our Serious Games</h2>
        <p>Serious Games makes immersive, high-stakes role-play, live-action simulations that transform corporate training into something unforgettable.</p> 
        <p>Train Through Play. Learn by being. Remember Forever.</p>
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
    
    <div class="content-grid">
        <?php foreach ($front_page_training as $index => $item): ?>
            <div class="content-card image-card <?php echo ($index === count($front_page_training) - 1 && count($front_page_training) % 2 === 1) ? 'last-item' : ''; ?>">
                <?php if (isset($item['thumb'])): ?>
                    <?php render_picture($item['thumb'], $item['title'], '', [ 'sizes' => '(min-width: 968px) 400px, 100vw' ]); ?>
                <?php endif; ?>
                
                <div class="content-card-content">
                    <h2><a href="<?php echo htmlspecialchars($item['id']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></h2>
                    <h3><?php echo htmlspecialchars($item['subtitle']); ?></h3>
                    
                    <?php if (isset($item['outcomes']) && !empty($item['outcomes'])): ?>
                        <div class="outcomes">
                            <h4>Outcomes</h4>  
                            <?php foreach ($item['outcomes'] as $outcome): ?>
                                <div><?php echo htmlspecialchars($outcome); ?></div>      
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex-spacer"></div>
                    <a href="<?php echo htmlspecialchars($item['id']); ?>" class="cta-button">
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
                        <p><a href="/contact" class="cta-button">Find out more</a></p>
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
                    <li>➜ Neurodiversity Strategies</li>
                    <li>➜ Wellbeing and resilience</li>
                    <li>➜ Communication</li>
                    <li>➜ Leadership</li>
                    <li>➜ Problem solving</li>
                    <li>➜ Critical thinking</li>
                    <li>➜ Imagination</li>
                    <li>➜ Empathy</li>
                    <li>➜ Creativity</li>
                    <li>➜ Level up your pitching</li>
                    <li>➜ Collaboration</li>
                    <li>➜ Resilience</li>
                    <li>➜ Adaptability</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
