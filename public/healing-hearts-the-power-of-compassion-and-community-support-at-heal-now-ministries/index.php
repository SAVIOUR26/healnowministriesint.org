<?php
require __DIR__ . '/../../bootstrap.php';

$post = post_content('healing-hearts-the-power-of-compassion-and-community-support-at-heal-now-ministries');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
