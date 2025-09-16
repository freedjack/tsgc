<?php

// SEO
$page_title = 'FAQ';
$page_description = 'Answers to common questions about our immersive training, logistics, and how we work.';

include 'includes/header.php';
?>

<?php 
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Frequently Asked Questions';
$hero_subtitle = 'Everything you need to know about our training';
include 'includes/hero.php';
?>

<div class="content-card container">
    <div class="faq-grid">
        <div class="faq-item" id="faq-duration">
            <h3>How long does a typical training session last?</h3>
            <p>Our training sessions can range from half-day intensive workshops to multi-day comprehensive programs, depending on your needs and objectives.</p>
        </div>
        <div class="faq-item" id="faq-location">
            <h3>Where do the training sessions take place?</h3>
            <p>We can deliver training at your location, at our dedicated training facilities, or at a venue of your choice. We're flexible to accommodate your preferences.</p>
        </div>
        <div class="faq-item" id="faq-size">
            <h3>What's the ideal group size for training?</h3>
            <p>Our training works best with groups of 6-20 participants, but we can accommodate larger groups with additional facilitators.</p>
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
            <p>Our immersive, hands-on approach engages participants actively in realistic scenarios, making learning more memorable and immediately applicable.</p>
        </div>
    </div>
</div>

<div class="content-card container">
    <div class="text-content" style="text-align:center;">
        <h2>Still have questions?</h2>
        <p><a class="cta-button" href="/contact">Contact us</a></p>
    </div>
    
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type": "Question", "name": "How long does a typical training session last?", "acceptedAnswer": {"@type": "Answer", "text": "Our training sessions can range from half-day intensive workshops to multi-day comprehensive programs, depending on your needs and objectives."}},
    {"@type": "Question", "name": "Where do the training sessions take place?", "acceptedAnswer": {"@type": "Answer", "text": "We can deliver training at your location, at our dedicated training facilities, or at a venue of your choice."}},
    {"@type": "Question", "name": "What's the ideal group size for training?", "acceptedAnswer": {"@type": "Answer", "text": "Our training works best with groups of 6-20 participants, but we can accommodate larger groups."}},
    {"@type": "Question", "name": "Do you provide follow-up support?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we provide comprehensive debriefing sessions and ongoing support to help reinforce learning."}},
    {"@type": "Question", "name": "Can you customize training for our specific industry?", "acceptedAnswer": {"@type": "Answer", "text": "Absolutely! We create bespoke training scenarios tailored to your industry and challenges."}},
    {"@type": "Question", "name": "What makes your training different from traditional methods?", "acceptedAnswer": {"@type": "Answer", "text": "Our immersive, hands-on approach engages participants in realistic scenarios, making learning memorable and applicable."}}
  ]
}
</script>

<?php include 'includes/footer.php'; ?>



