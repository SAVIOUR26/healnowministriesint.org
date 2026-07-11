<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$post = post_content('stories-of-transformation-changing-lives-with-heal-now-ministries-international');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
