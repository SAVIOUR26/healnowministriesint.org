<?php
require __DIR__ . '/../../bootstrap.php';

$page = page_content('what-we-do');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap">
        <h1><?= e($page['title']) ?></h1>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="section-head section-head--center">
            <h2><?= e($page['heading']) ?></h2>
            <p class="lede"><?= e($page['subhead']) ?></p>
        </div>
        <div class="grid grid--4">
            <?php foreach ($page['programs'] as $program): ?>
            <div class="card">
                <h3><?= e($program['title']) ?></h3>
                <p><?= e($program['body']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap">
        <div class="section-head">
            <h2><?= e($page['community_projects']['heading']) ?></h2>
            <p><?= e($page['community_projects']['body']) ?></p>
        </div>
        <div class="photo-strip">
            <?php foreach ($page['community_projects']['images'] as $src): ?>
            <?= img($src, 'Community project in Uganda') ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="cta-band">
            <h2>Support Our Programs</h2>
            <p>Your support helps us reach more children, youth, women, and elderly across Uganda.</p>
            <div style="margin-top:2rem; display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
                <?= btn('Donate Now', '/donate/') ?>
                <?= btn('Get Involved', '/get-involved/', 'ghost') ?>
            </div>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
