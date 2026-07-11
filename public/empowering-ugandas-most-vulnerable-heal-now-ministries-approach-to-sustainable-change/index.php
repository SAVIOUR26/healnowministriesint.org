<?php
require __DIR__ . '/../../bootstrap.php';

$post = post_content('empowering-ugandas-most-vulnerable-heal-now-ministries-approach-to-sustainable-change');
$meta = $post['meta'];
render('header.php', ['meta' => $meta]);
render('post.php', ['post' => $post]);
render('footer.php');
