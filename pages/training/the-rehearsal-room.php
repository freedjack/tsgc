<?php
require_once __DIR__ . '/../../app/bootstrap/bootstrap.php';
$content = getContentById('the-rehearsal-room');

if (!$content) {
    header('Location: /training');
    exit;
}

$page_title = $content['title'];
$page_description = $content['subtitle'] . ' ' . $content['body'];
$page_keywords = 'rehearsal training, high-stakes rehearsal, role play rehearsal, performance preparation';

include __DIR__ . '/../../app/views/partials/header.php';
?>

<?php
$hero_image = $content['image'];
$hero_title = $content['title'];
$hero_subtitle = $content['subtitle'];
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<div class="container">
    <div class="content-card">
        <div class="flex-container">
            <div class="text-content">
                <h2>About This Training</h2>
                <p><?php echo htmlspecialchars($content['body']); ?></p>

                <?php if (!empty($content['outcomes'])): ?>
                    <h3>Outcomes</h3>
                    <div class="outcomes">
                        <?php foreach ($content['outcomes'] as $outcome): ?>
                            <div><?php echo htmlspecialchars($outcome); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <p style="margin-top: 2rem;">
                    <a href="/contact" class="btn-primary">Discuss a bespoke rehearsal</a>
                </p>
            </div>
            <div class="image-container">
                <?php render_picture($content['image'], $content['title'], '', [ 'sizes' => '(min-width: 968px) 600px, 100vw' ]); ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
