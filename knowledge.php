<?php
require_once 'config.php';

// SEO
$page_title = 'Insights & Knowledge | ' . SITE_NAME;
$page_description = 'Articles, guides and background information about immersive training, facilitation and learning by doing.';

include 'includes/header.php';
?>

<?php 
$hero_image = 'assets/images/large/OnPodium.jpg';
$hero_title = 'Insights & Knowledge';
$hero_subtitle = 'Articles and background information';
include 'includes/hero.php';
?>

<div class="container">
    <div class="content-grid">
        <a class="content-card left-content" href="/knowledge/what-is-immersive-training">
            <h2>What is immersive training?</h2>
            <h3>A quick primer on learning by being</h3>
            <p>Immersive training puts participants inside realistic scenarios where they can safely practice skills, explore decisions, and learn by doing. This article introduces the core principles and benefits.</p>
            <div class="outcomes">
                <div>Active learning</div>
                <div>Psychological safety</div>
                <div>Immediate feedback</div>
            </div>
        </a>
        <a class="content-card left-content" href="/knowledge/designing-effective-scenarios">
            <h2>Designing effective scenarios</h2>
            <h3>From goals to debrief</h3>
            <p>How we design scenarios: aligning with outcomes, calibrating challenge, and crafting strong debriefs so learning sticks.</p>
        </a>
        <a class="content-card left-content" href="/knowledge/facilitation-tips">
            <h2>Facilitation tips</h2>
            <h3>Running live simulations with confidence</h3>
            <p>Practical guidance for facilitators on briefing, spotting teachable moments, and keeping engagement high.</p>
        </a>
    </div>
</div>

<div class="content-card container">
    <div class="text-content" style="text-align:center;">
        <h2>Looking for something specific?</h2>
        <p><a class="cta-button" href="contact.php">Ask us a question</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>


