<?php
/**
 * Renders a single blog post's article body.
 * Expects: $post (from content/posts/*.php)
 */
?>
<article class="reveal">
    <header class="page-header" style="padding-bottom:0;">
        <div class="wrap wrap--narrow">
            <p class="eyebrow"><?= e($post['category']) ?></p>
            <h1><?= e($post['title']) ?></h1>
            <p class="lede">By <?= e($post['author']) ?> &middot; <?= e(date('F j, Y', strtotime($post['date']))) ?></p>
        </div>
    </header>

    <div class="wrap wrap--narrow" style="margin-top:2.5rem;">
        <?= img($post['image'], $post['title'], '', 'eager') ?>

        <div class="post-body" style="margin-top:2.5rem;">
            <?php foreach ($post['body'] as $block): ?>
                <?php if (is_array($block) && isset($block['heading'])): ?>
                <h2><?= e($block['heading']) ?></h2>
                <?php elseif (is_array($block) && isset($block['list'])): ?>
                <ul class="icon-list">
                    <?php foreach ($block['list'] as $item): ?>
                    <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <p><?= e($block) ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</article>

<section class="reveal">
    <div class="wrap">
        <div class="cta-band">
            <h2>Get Involved</h2>
            <p>Want to be part of more stories like this? Visit our Get Involved page to learn how you can contribute to our mission.</p>
            <div style="margin-top:2rem;">
                <?= btn('Get Involved', '/get-involved/') ?>
            </div>
        </div>
    </div>
</section>
