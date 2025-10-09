<?php

include 'includes/config.php';
// Get content for this specific training program
$content = getContentById('the-hack');

if (!$content) {
    header('Location: training.php');
    exit;
}

// SEO settings for this page
$page_title = $content['title'];
$page_description = $content['subtitle'] . ' ' . $content['body'];
$page_keywords = 'cyber security training, hacker simulation, red team training, cyber security awareness, immersive learning';
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
                
                <h3>Why Cyber Security Training Matters</h3>
                <p>In today's digital world, cyber security is everyone's responsibility. Traditional training often focuses on policies and procedures, but true understanding comes from experiencing the mindset and techniques of those who would exploit vulnerabilities.</p>
                
                <p>By stepping into the shoes of a hacker, participants gain invaluable insights into:</p>
                <ul>
                    <li>How attackers think and operate</li>
                    <li>Common vulnerabilities and attack vectors</li>
                    <li>The importance of security awareness</li>
                    <li>Real-world threat scenarios</li>
                </ul>
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
                <div><strong>Equipment:</strong> Provided (no technical expertise required)</div>
                <div><strong>Location:</strong> Your premises or our facilities</div>
            </div>
        </div>
        
        <div class="content-card">
            <h2>Who Should Attend</h2>
            <div class="outcomes">
                <div>IT Security Teams</div>
                <div>Management & Leadership</div>
                <div>HR & Compliance Staff</div>
                <div>End Users & Employees</div>
                <div>Anyone interested in cyber security</div>
            </div>
        </div>
    </div>
</div>

<!-- Training Scenario -->
<div class="content-card container">
    <h2>Training Scenario Overview</h2>
    <div class="scenario-content">
        <p>Participants are divided into teams and given the role of ethical hackers (red team) tasked with identifying and exploiting vulnerabilities in a simulated corporate network. Through hands-on activities, they learn:</p>
        
        <h3>Phase 1: Reconnaissance</h3>
        <p>Learn how attackers gather information about their targets, including open-source intelligence techniques and social engineering approaches.</p>
        
        <h3>Phase 2: Vulnerability Assessment</h3>
        <p>Practice identifying common security weaknesses in systems, applications, and human behavior.</p>
        
        <h3>Phase 3: Exploitation</h3>
        <p>Experience how vulnerabilities can be exploited in a safe, controlled environment.</p>
        
        <h3>Phase 4: Post-Exploitation</h3>
        <p>Understand what happens after a successful breach and how to prevent or mitigate damage.</p>
        
        <h3>Phase 5: Debrief & Learning</h3>
        <p>Reflect on the experience and develop actionable strategies for improving security posture.</p>
    </div>
</div>

<!-- Benefits Section -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>Key Benefits</h2>
            <div class="outcomes">
                <div><strong>Hands-on Experience:</strong> Learn by doing, not just listening</div>
                <div><strong>Safe Environment:</strong> Practice in a controlled, risk-free setting</div>
                <div><strong>Real-world Relevance:</strong> Address actual security challenges</div>
                <div><strong>Team Building:</strong> Collaborate on security challenges</div>
                <div><strong>Immediate Application:</strong> Apply lessons learned right away</div>
            </div>
        </div>
        
        <div class="content-card">
            <h2>What You'll Take Away</h2>
            <div class="outcomes">
                <div>Enhanced security awareness</div>
                <div>Practical threat recognition skills</div>
                <div>Improved incident response capabilities</div>
                <div>Better understanding of attacker mindset</div>
                <div>Actionable security recommendations</div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="content-card container">
    <div class="text-content" style="text-align: center;">
        <h2>Ready to Experience The Hack?</h2>
        <p>Transform your team's understanding of cyber security through immersive, hands-on training.</p>
        <p>
            <a href="contact.php?training=the-hack" class="cta-button">Book This Training</a>
            <a href="training.php" class="cta-button dt-l-m">View All Programs</a>
        </p>
    </div>
</div>

<!-- Additional CSS for this page -->
<!-- <style>
.scenario-content h3 {
    color: var(--accent-color);
    margin-top: 2rem;
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
}

.scenario-content p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

.outcome-item {
    background: var(--bg-primary);
    padding: 1.5rem;
    border-radius: 8px;
    border-left: 4px solid var(--accent-color);
}

.outcome-item h3 {
    margin: 0;
    color: var(--primary-color);
    font-size: 1.1rem;
} -->
</style>

<?php include 'includes/footer.php'; ?>
