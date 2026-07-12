<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$site = site_content();
$page = page_content('home');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="hero">
    <img class="hero__bg" src="<?= e($page['hero']['image']) ?>" alt="" loading="eager" fetchpriority="high">
    <div class="hero__scrim"></div>
    <div class="hero__tagline-badge" aria-hidden="true"><?= e($site['tagline']) ?></div>
    <div class="wrap hero__content">
        <span class="eyebrow"><?= e($page['hero']['eyebrow']) ?></span>
        <h1><?= e($page['hero']['headline']) ?></h1>
        <div class="hero__actions">
            <?= btn($page['hero']['cta']['label'], $page['hero']['cta']['href']) ?>
            <?= btn('Donate', '/donate/', 'ghost') ?>
        </div>
    </div>
    <div class="hero__scroll-cue">
        <span>Scroll</span>
        <?= icon('chevron-down') ?>
    </div>
</section>

<div class="wrap">
    <div class="hero-quicklinks reveal">
        <?php foreach ($page['what_we_do']['programs'] as $program): ?>
        <div class="hero-quicklinks__item">
            <span class="hero-quicklinks__icon"><?= icon($program['icon']) ?></span>
            <span><?= e($program['title']) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<section class="reveal">
    <div class="wrap media-split">
        <div class="media-split__media">
            <?= img($page['who_we_are']['image'], 'Heal Now Ministries International at work in Uganda') ?>
        </div>
        <div>
            <h2><?= e($page['who_we_are']['heading']) ?></h2>
            <p class="lede"><?= e($page['who_we_are']['body']) ?></p>
            <?= btn($page['who_we_are']['cta']['label'], $page['who_we_are']['cta']['href'], 'outline') ?>
        </div>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap">
        <div class="section-head section-head--center">
            <h2><?= e($page['what_we_do']['heading']) ?></h2>
            <p class="lede"><?= e($page['what_we_do']['subhead']) ?></p>
        </div>
        <div class="grid grid--4">
            <?php foreach ($page['what_we_do']['programs'] as $program): ?>
            <div class="card">
                <span class="card__icon"><?= icon($program['icon']) ?></span>
                <h3><?= e($program['title']) ?></h3>
                <p><?= e($program['body']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center; margin-top: 2.5rem;">
            <?= btn($page['what_we_do']['cta']['label'], $page['what_we_do']['cta']['href']) ?>
        </div>
    </div>
</section>

<section class="reveal">
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
            <h2><?= e($page['get_involved']['heading']) ?></h2>
            <p><?= e($page['get_involved']['body']) ?></p>
            <div style="margin-top:2rem;">
                <?= btn($page['get_involved']['cta']['label'], $page['get_involved']['cta']['href']) ?>
            </div>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
