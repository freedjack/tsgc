<?php
// Set 404 status code
http_response_code(404);

// SEO settings for 404 page
$page_title = 'Page Not Found';
$page_description = 'The page you are looking for could not be found.';
$canonical_url = SITE_URL . '/404';

include 'includes/header.php';
?>

<div class="container">
    <div class="content-card">
        <h1>Page Not Found</h1>
        <p>The page you are looking for could not be found. It may have been moved, deleted, or you may have typed the wrong URL.</p>
        
        <h2>What you can do:</h2>
        <ul>
            <li>Check the URL for typos</li>
            <li>Go back to the <a href="/">home page</a></li>
            <li>Visit our <a href="/training">training programs</a></li>
            <li>Explore our <a href="/knowledge">knowledge & insights</a></li>
            <li><a href="/contact">Contact us</a> for assistance</li>
        </ul>
        
        <div style="margin-top: 2rem;">
            <a href="/" class="cta-button">Go to Home Page</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
