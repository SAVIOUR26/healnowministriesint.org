<?php
require __DIR__ . '/../../bootstrap.php';

$post = post_content('stories-of-transformation-changing-lives-with-heal-now-ministries-international');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
