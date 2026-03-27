<?php

// SEO
$page_title = 'FAQ | Serious Games Training Logistics';
$page_description = 'Common questions about our corporate training: Group sizes, locations (UK-wide), customized scenarios, and ROI measurement.';
$additional_jsonld = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'How long does a typical training session last?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our training sessions can range from an hour long workshops to multi-day comprehensive programs, depending on your needs and objectives.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Where do the training sessions take place?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We can deliver training at your location or at a venue of your choice. We\'re flexible to accommodate your preferences.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What\'s the ideal group size for training?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our training works best with groups of 6-30 participants, but we can accommodate larger groups with additional facilitators.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you provide follow-up support?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes, we provide comprehensive debriefing sessions and can offer ongoing support to help reinforce learning and track progress.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you customize training for our specific industry?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Absolutely! We specialize in creating bespoke training scenarios tailored to your industry, challenges, and organizational culture.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What makes your training different from traditional methods?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our immersive, hands-on approach engages participants actively in realistic scenarios, making learning more memorable and immediately applicable.',
            ],
        ],
    ],
];

include __DIR__ . '/../../app/views/partials/header.php';
?>

<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Frequently Asked Questions';
$hero_subtitle = 'Everything you need to know about our training';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<div class="content-card">
    <div class=" container">
        <div class="faq-item" id="faq-duration">
            <h3>How long does a typical training session last?</h3>
            <p>Our training sessions can range from an hour long workshops to multi-day comprehensive programs, depending on your needs and objectives.</p>
        </div>
        <div class="faq-item" id="faq-location">
            <h3>Where do the training sessions take place?</h3>
            <p>We can deliver training at your location or at a venue of your choice. We're flexible to accommodate your preferences.</p>
        </div>
        <div class="faq-item" id="faq-size">
            <h3>What's the ideal group size for training?</h3>
            <p>Our training works best with groups of 6-30 participants, but we can accommodate larger groups with additional facilitators.</p>
        </div>
        <div class="faq-item" id="faq-support">
            <h3>Do you provide follow-up support?</h3>
            <p>Yes, we provide comprehensive debriefing sessions and can offer ongoing support to help reinforce learning and track progress.</p>
        </div>
        <div class="faq-item" id="faq-customize">
            <h3>Can you customize training for our specific industry?</h3>
            <p>Absolutely! We specialize in creating bespoke training scenarios tailored to your industry, challenges, and organizational culture.</p>
        </div>
        <div class="faq-item" id="faq-difference">
            <h3>What makes your training different from traditional methods?</h3>
            <p>Our immersive, hands-on approach engages participants actively in realistic scenarios, making learning more memorable and immediately applicable. Read more about <a href="/knowledge/benefits-of-role-play">the benefits of role play</a>.</p>
        </div>
    </div>
</div>

<div class="content-card container">
    <div class="text-content" style="text-align:center;">
        <h2>Still have questions?</h2>
        <p><a class="cta-button" href="/contact">Contact us</a></p>
    </div>
    
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>



