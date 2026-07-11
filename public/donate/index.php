<?php
require __DIR__ . '/../../bootstrap.php';

$page = page_content('donate');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap wrap--narrow">
        <h1>Donate</h1>
        <p class="lede"><?= e($page['intro']) ?></p>
    </div>
</section>

<section class="reveal">
    <div class="wrap wrap--narrow">
        <h2><?= e($page['why_donate']['heading']) ?></h2>
        <p><?= e($page['why_donate']['intro']) ?></p>
        <ul class="icon-list">
            <?php foreach ($page['why_donate']['items'] as $item): ?>
            <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>
        <p><?= e($page['why_donate']['closing']) ?></p>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap wrap--narrow" style="text-align:center;">
        <h2><?= e($page['how_to_donate']['heading']) ?></h2>
        <p><?= e($page['how_to_donate']['body']) ?></p>
        <div class="qr-block" style="justify-content:center;">
            <?= btn($page['how_to_donate']['cta']['label'], $page['how_to_donate']['cta']['href']) ?>
            <?= img($page['how_to_donate']['qr_image'], 'Scan to donate to Heal Now Ministries International') ?>
        </div>
    </div>
</section>

<section class="reveal">
    <div class="wrap wrap--narrow">
        <h2><?= e($page['bank_transfer']['heading']) ?></h2>
        <ul class="icon-list">
            <?php foreach ($page['bank_transfer']['items'] as $item): ?>
            <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="bg-light reveal">
    <div class="wrap">
        <div class="section-head section-head--center">
            <h2><?= e($page['donation_options']['heading']) ?></h2>
        </div>
        <div class="grid grid--3">
            <?php foreach ($page['donation_options']['items'] as $option): ?>
            <div class="card">
                <h3><?= e($option['title']) ?></h3>
                <p><?= e($option['body']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="reveal">
    <div class="wrap media-split">
        <div>
            <h2><?= e($page['impact']['heading']) ?></h2>
            <p><?= e($page['impact']['intro']) ?></p>
            <ul class="icon-list">
                <?php foreach ($page['impact']['items'] as $item): ?>
                <li><?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="media-split__media">
            <?= img($page['impact']['image'], 'Thank you for your donation') ?>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
