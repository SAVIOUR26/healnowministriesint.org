<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$post = post_content('healing-hearts-the-power-of-compassion-and-community-support-at-heal-now-ministries');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
