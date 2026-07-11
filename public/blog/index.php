<?php
require __DIR__ . '/../../bootstrap.php';

$page = page_content('blog');
$meta = $page['meta'];
$posts = all_posts();
render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap">
        <h1><?= e($page['title']) ?></h1>
    </div>
</section>

<section class="reveal">
    <div class="wrap">
        <div class="grid grid--2">
            <?php foreach ($posts as $post): ?>
            <a class="post-card" href="/<?= e($post['slug']) ?>/">
                <div class="post-card__media">
                    <?= img($post['image'], $post['title']) ?>
                </div>
                <div class="post-card__body">
                    <span class="post-card__category"><?= e($post['category']) ?></span>
                    <h2 style="font-size:1.3rem; margin:0;"><?= e($post['title']) ?></h2>
                    <p class="post-card__excerpt"><?= e($post['excerpt']) ?></p>
                    <span class="post-card__link">Read More &rarr;</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
