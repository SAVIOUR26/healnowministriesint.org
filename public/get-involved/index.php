<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$page = page_content('get-involved');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap wrap--narrow">
        <h1>Get Involved</h1>
        <p class="lede"><?= e($page['intro']) ?></p>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="section-head section-head--center">
            <h2><?= e($page['ways_to_get_involved']['heading']) ?></h2>
        </div>
        <div class="grid grid--3">
            <?php foreach ($page['ways_to_get_involved']['items'] as $item): ?>
            <div class="card">
                <h3><?= e($item['title']) ?></h3>
                <p><?= e($item['body']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap wrap--narrow" style="text-align:center;">
        <h2><?= e($page['success_stories']['heading']) ?></h2>
        <p><?= e($page['success_stories']['body']) ?></p>
        <?= btn('Read Our Stories', '/blog/', 'outline') ?>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="cta-band">
            <h2><?= e($page['call_to_action']['heading']) ?></h2>
            <p><?= e($page['call_to_action']['body']) ?></p>
            <div style="margin-top:2rem;">
                <?= btn($page['call_to_action']['cta']['label'], $page['call_to_action']['cta']['href']) ?>
            </div>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
