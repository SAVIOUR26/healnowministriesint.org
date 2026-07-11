<?php
require __DIR__ . '/../../bootstrap.php';

$page = page_content('sample-page');
$meta = $page['meta'];
render('header.php', ['meta' => $meta]);
?>

<section class="reveal">
    <div class="wrap wrap--narrow">
        <?php foreach ($page['paragraphs'] as $p): ?>
        <p><?= e($p) ?></p>
        <?php endforeach; ?>

        <?php foreach ($page['quotes'] as $q): ?>
        <blockquote><?= e($q) ?></blockquote>
        <?php endforeach; ?>

        <p><?= e($page['middle']) ?></p>

        <?php foreach ($page['quotes2'] as $q): ?>
        <blockquote><?= e($q) ?></blockquote>
        <?php endforeach; ?>

        <p><?= e($page['closing']) ?></p>
    </div>
</section>

<?php render('footer.php'); ?>
