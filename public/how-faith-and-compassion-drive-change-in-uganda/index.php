<?php
require __DIR__ . '/../../bootstrap.php';

$post = post_content('how-faith-and-compassion-drive-change-in-uganda');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
