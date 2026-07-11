<?php
require __DIR__ . '/../../bootstrap.php';

$page = page_content('online-radio');
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
        <div class="radio-player">
            <?= img($page['logo'], 'Heal Now radio station logo') ?>
            <?php if ($page['stream_url']): ?>
            <audio controls preload="none" src="<?= e($page['stream_url']) ?>"></audio>
            <?php else: ?>
            <p class="lede"><?= e($page['note']) ?></p>
            <audio controls preload="none"></audio>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
