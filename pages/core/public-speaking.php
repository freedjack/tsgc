<?php
// SEO settings
$page_title = 'Public Speaking Training | Presence & Influence';
$page_description = 'Public speaking skills: Learn to speak publicly with confidence and ease. Transform your presentation with actor-led training.';
$page_keywords = 'public speaking, presentation skills, executive presence, voice coaching, storytelling, keynote training';

$additional_jsonld = [
    '@context' => 'https://schema.org',
    '@type' => 'Review',
    'itemReviewed' => [
        '@type' => 'Service',
        'name' => 'Public Speaking Training',
        'provider' => [
            '@type' => 'Organization',
            'name' => 'The Serious Games Company',
            'url' => 'https://theseriousgamescompany.com/public-speaking',
        ],
    ],
    'reviewRating' => [
        '@type' => 'Rating',
        'ratingValue' => '5',
        'bestRating' => '5',
    ],
    'author' => [
        '@type' => 'Person',
        'name' => 'Jeff Ive',
        'jobTitle' => 'CTO',
        'worksFor' => [
            '@type' => 'Organization',
            'name' => 'Adaptavate',
        ],
    ],
    'reviewBody' => 'I worked with Dave in an intense period to hone my script and perfect my delivery. The pointers he shared will be helpful for life — across all forms of communication, and particularly public speaking. With his help, I was able to turn a daunting prospect into a moment I genuinely enjoyed. That enjoyment must have transferred to the jury, because we were successful in our funding pitch. Dave\'s help has been catalytic in getting an idea I\'ve worked on for years finally funded.',
    'datePublished' => '2026-03-27',
];

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/OnPodium.jpg'; 
$hero_title = 'Presence & Influence';
$hero_subtitle = 'Learn to present like a TED talk';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Client testimonial -->
<section class="testimonial-ps" aria-labelledby="testimonial-ps-heading">
    <div class="container compact-section">
        <figure class="content-card testimonial-ps__figure">
            <h2 id="testimonial-ps-heading" class="testimonial-ps__title">Don't take our word for it</h2>
            <div class="testimonial-ps__journey" aria-hidden="true">
                <div class="testimonial-ps__step">
                    <span class="testimonial-ps__label">Before</span>
                    <span class="testimonial-ps__jtext">Daunting once-in-a-lifetime pitch</span>
                </div>
                <span class="testimonial-ps__arrow" aria-hidden="true">→</span>
                <div class="testimonial-ps__step">
                    <span class="testimonial-ps__label">During</span>
                    <span class="testimonial-ps__jtext">Intensive coaching on script &amp; delivery</span>
                </div>
                <span class="testimonial-ps__arrow" aria-hidden="true">→</span>
                <div class="testimonial-ps__step">
                    <span class="testimonial-ps__label">After</span>
                    <span class="testimonial-ps__jtext">European grant secured</span>
                </div>
            </div>

            <div class="testimonial-ps__lead">
                <span class="testimonial-ps__badge">European grant secured</span>
                <blockquote class="testimonial-ps__pull" cite="https://theseriousgamescompany.com/public-speaking">
                    <span class="sr-only">Jeff Ive, CTO at Adaptavate, said: </span>
                    &ldquo;Dave makes dreams reality.&rdquo;
                </blockquote>
            </div>

            <p class="testimonial-ps__body">
                &ldquo;I worked with Dave in an intense period to hone my script and perfect my delivery.
                The pointers he shared will be helpful for life &mdash; across all forms of communication,
                and particularly public speaking. With his help, I was able to turn a daunting prospect
                into a moment I genuinely enjoyed. That enjoyment must have transferred to the jury,
                because we were successful in our funding pitch. Dave&rsquo;s help has been catalytic in getting
                an idea I&rsquo;ve worked on for years finally funded.&rdquo;
            </p>

            <figcaption class="testimonial-ps__attr">
                <div class="testimonial-ps__avatar" aria-hidden="true">JI</div>
                <div>
                    <span class="testimonial-ps__name">Jeff Ive</span>
                    <span class="testimonial-ps__role">CTO</span>
                    <span class="testimonial-ps__company">Adaptavate</span>
                </div>
            </figcaption>
        </figure>
    </div>
</section>

<!-- Introduction -->
<div class="container">
    <div class="content-card">
        <div class="text-content">
            <h2>It's Not About the Slide Deck</h2>
            <p>Most public speaking training focuses on the content. We focus on the instrument: You.</p>
            <p>Using techniques from drama and theatre, we can train you and your team to find their authentic voice, manage performance anxiety, and hold an audience in the palm of your hand. Whether it's a board meeting or a keynote to thousands, the principles of presence remain the same.</p>
        </div>
    </div>
</div>

<!-- Our Method -->
<div class="content-card container" style="background-color: var(--bg-secondary);">
    <div class="flex-container">
        <div class="text-content">
            <h2>Our Method</h2>
            <p>With over twenty years of theatrical experience, we develop the skills and techniques that transform the way you communicate.</p>
            <p>Our tutor, Dave Lovatt, trained under the Head of the Directors Guild UK. That foundation has given him the tools to completely reshape your speaking voice — showing you how to bring any presentation vividly to life.</p>
            <p>Using proven Stanislavski techniques, you'll learn how to harness motivation — the simple but powerful question: "What do I want?" Whether it's "I want to sell more of my product" or "I want to inspire my team," that clear objective becomes the driving force behind your speech.</p>
            <p>You'll discover how to use "mind images" to paint pictures so your audience doesn't just hear you — they see what you see.</p>
            <p>You'll learn how to vary rhythm and pace to energise key moments.</p>
            <p>You'll understand the power of silence — giving your audience space to absorb, reflect, and connect with your ideas.</p>
            <p>In just a few hours, your team can transform their presentation technique — speaking with clarity, confidence, and real impact.</p>
            <p>Using impro to simulate high-stakes interactions with realistic emotional weight, we bridge the gap between theory and practice. Your team builds muscle memory, not just notes.</p>
        </div>
        <div class="image-container">
            <?php render_picture('assets/images/optimized/large/jpg/laugh-live-and-let-dine-june-2024-celtic-manor-pb-25.jpg', 'Professional actors in character', '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
        </div>
    </div>
</div>

<!-- Content Grid -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>What We Cover</h2>
            <div class="outcomes">
                <ul>
                    <li><strong>Physical Presence:</strong> Grounding, posture, and owning the space.</li>
                    <li><strong>Vocal Power:</strong> Projection, resonance, silence, and variety.</li>
                    <li><strong>Storytelling:</strong> Bringing your images to life.</li>
                    <li><strong>Nerves:</strong> Turning adrenaline into focus.</li>
                </ul>
            </div>
        </div>
        
        <div class="content-card">
            <h2>Who It's For</h2>
            <div class="outcomes">
                <ul>
                    <li><strong>Senior Leadership:</strong> For high-stakes keynotes and town halls.</li>
                    <li><strong>Sales Teams:</strong> For pitching and client presentations.</li>
                    <li><strong>Emerging Leaders:</strong> Building confidence and authority.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA -->
<?php include __DIR__ . '/../../app/views/partials/cta-contact.php'; ?>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
