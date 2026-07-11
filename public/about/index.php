<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$page = page_content('about');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap">
        <h1><?= e($page['title']) ?></h1>
    </div>
</section>

<section class="reveal">
    <div class="wrap media-split">
        <div class="media-split__media photo-strip" style="grid-template-columns: 1fr 1fr;">
            <?php foreach ($page['our_story']['images'] as $src): ?>
            <?= img($src, 'Heal Now Ministries International community work') ?>
            <?php endforeach; ?>
        </div>
        <div>
            <h2><?= e($page['our_story']['heading']) ?></h2>
            <p class="lede"><?= e($page['our_story']['subhead']) ?></p>
            <p><?= e($page['our_story']['body']) ?></p>
        </div>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap">
        <div class="section-head section-head--center">
            <h2><?= e($page['vision_mission']['heading']) ?></h2>
        </div>
        <div class="media-split media-split--reverse">
            <div class="media-split__media">
                <?= img($page['vision_mission']['image'], 'Heal Now Ministries International vision and mission') ?>
            </div>
            <div class="grid" style="gap: 2rem;">
                <div class="card">
                    <h3><?= e($page['vision_mission']['mission']['title']) ?></h3>
                    <p class="lede"><?= e($page['vision_mission']['mission']['subhead']) ?></p>
                    <p><?= e($page['vision_mission']['mission']['body']) ?></p>
                </div>
                <div class="card">
                    <h3><?= e($page['vision_mission']['vision']['title']) ?></h3>
                    <p class="lede"><?= e($page['vision_mission']['vision']['subhead']) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="cta-band">
            <h2>Join Us in Our Mission</h2>
            <p>Whether through volunteering, donating, or partnering with us, you can help us continue transforming lives across Uganda.</p>
            <div style="margin-top:2rem;">
                <?= btn('Get Involved', '/get-involved/') ?>
            </div>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
