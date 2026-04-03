<?php
$page_title = 'The Behavioral Playbook';
$page_description = 'Curated books, podcasts, and research behind The Serious Games Company: behavioral economics, neurobiology of play and stress, and high-stakes communication—your operating manual for the human mind.';
$page_keywords = 'behavioral economics, neuroplasticity, serious games, immersive training, Huberman Lab, negotiation training, Yerkes-Dodson, Kahneman, learning science';

$article = [
    'headline' => $page_title,
    'image' => '/assets/images/optimized/large/jpg/room-with-tables.jpg',
    'mainEntityOfPage' => '/knowledge/the-playbook',
];

include __DIR__ . '/../../app/views/partials/header.php';
?>

<?php
$hero_image = 'assets/images/optimized/large/jpg/room-with-tables.jpg';
$hero_title = 'Don\'t Take Our Word For It. Look at the Science.';
$hero_subtitle = 'The Serious Games Company methodology is inspired by neurobiology, psychology and behavioural science.';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<div class="playbook-page">
    <section class="playbook-category container" aria-labelledby="playbook-cat-1">
        <h2 id="playbook-cat-1">The Human Operating System (Behavioral Science)</h2>
        <p class="playbook-category-lede">There is no cheat code or hack to human behaviour but we can learn from the science of how we think and how we make decisions.</p>
        <div class="content-grid playbook-grid">
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M8 7h8"/><path d="M8 11h8"/></svg>
                </div>
                <h3 class="playbook-card__title">Thinking, Fast and Slow</h3>
                <p class="playbook-card__author">Daniel Kahneman</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> It frames the two systems that drive how we think—fast, intuitive System 1 versus slower, deliberative System 2—so we can design immersive scenarios that engage System 1 instead of relying on logical slides alone.</p>
            </article>
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M8 7h8"/><path d="M8 11h8"/></svg>
                </div>
                <h3 class="playbook-card__title">Alchemy: The Dark Art and Curious Science of Creating Magic in Brands</h3>
                <p class="playbook-card__author">Rory Sutherland</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> It reminds us that the opposite of a good idea can still be a good idea—and that over-relying on logic often undermines human engagement, which is why we prioritize felt experience in rehearsal, not just explanation.</p>
            </article>
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" x2="12" y1="19" y2="22"/></svg>
                </div>
                <h3 class="playbook-card__title"><a href="https://www.katymilkman.com/podcast" target="_blank" rel="noopener noreferrer">Choiceology</a></h3>
                <p class="playbook-card__author">Katy Milkman</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> High-production stories about behavioural economics and irrational choices help us ground scenarios in how people actually decide under ambiguity—the same friction we recreate in the room.</p>
            </article>
                <h3 class="playbook-card__title"><a href="https://www.hubermanlab.com/" target="_blank" rel="noopener noreferrer">Huberman Lab — The Power of Play</a></h3>
                <p class="playbook-card__author">Andrew Huberman</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> It explains play as a biological lever for neuroplasticity and cognitive flexibility—the same mechanism we lean on when the Chaos Simulator pushes teams to rehearse without a script.</p>
            </article>
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6"/><path d="M10 9V7.5"/><path d="M14 9V7.5"/><path d="M9 21h6"/><path d="M7 3v5a5 5 0 0 0 10 0V3"/><path d="M7 21v-5a5 5 0 0 0 10 0v5"/></svg>
                </div>
                <h3 class="playbook-card__title"><a href="https://en.wikipedia.org/wiki/Yerkes%E2%80%93Dodson_law" target="_blank" rel="noopener noreferrer">The Yerkes–Dodson Law (stress–performance curve)</a></h3>
                <p class="playbook-card__author">Research reference</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> Performance rises with arousal up to a point—so we use theatrical pressure to find your team’s productive edge instead of staying stuck in either boredom or panic.</p>
            </article>
        </div>
    </section>

    <section class="playbook-category container" aria-labelledby="playbook-cat-3">
        <h2 id="playbook-cat-3">High-Stakes Communication</h2>
        <p class="playbook-category-lede">De-escalation, negotiation, and what happens inside high-pressure scenarios.</p>
        <div class="content-grid playbook-grid">
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M8 7h8"/><path d="M8 11h8"/></svg>
                </div>
                <h3 class="playbook-card__title">Never Split the Difference</h3>
                <p class="playbook-card__author">Chris Voss</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> Negotiation is treated as emotional and psychological work, not a spreadsheet—which mirrors how we run The Rehearsal Room: labels, tension, and listening under heat.</p>
            </article>
            <article class="content-card playbook-card">
                <div class="playbook-card__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" x2="12" y1="19" y2="22"/></svg>
                </div>
                <h3 class="playbook-card__title"><a href="https://hiddenbrain.org/" target="_blank" rel="noopener noreferrer">Hidden Brain</a></h3>
                <p class="playbook-card__author">NPR</p>
                <p class="playbook-card__why"><strong>Why we use this:</strong> It surfaces unconscious patterns and biases that show up in workplaces—exactly the subtext we make visible when actors push back in scenario work.</p>
            </article>
        </div>
    </section>
</div>

<div class="content-card container">
    <div class="text-content" style="text-align:center;">
        <h2>Explore more insights</h2>
        <p>
            <a class="cta-button" href="/knowledge">Back to Insights</a>
            <a class="cta-button dt-l-m" href="/contact">Talk to us</a>
        </p>
    </div>
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
