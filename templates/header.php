<?php
/**
 * Top of every page: <head> + site header/nav.
 * Expects: $meta = ['title' => ..., 'description' => ...]
 */
$site = site_content();
$meta = $meta ?? [];
$pageTitle = $meta['title'] ?? $site['name'];
$pageDescription = $meta['description'] ?? $site['description'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDescription) ?>">
<link rel="canonical" href="<?= e($site['url'] . ($_SERVER['REQUEST_URI'] ?? '/')) ?>">

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e($site['name']) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDescription) ?>">

<link rel="icon" href="/assets/images/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16.png">
<link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
    <div class="wrap site-header__inner">
        <a class="site-logo" href="/">
            <img src="/assets/images/logo.webp" width="48" height="48" alt="<?= e($site['name']) ?>">
            <span class="site-logo__text"><?= e($site['name']) ?></span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="sr-only">Menu</span>
        </button>

        <nav class="site-nav" id="site-nav" aria-label="Primary">
            <ul>
                <?php foreach ($site['nav'] as $item): ?>
                <li><a href="<?= e($item['href']) ?>" <?= is_active($item['href']) ? 'aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a class="btn btn--primary btn--sm site-nav__cta" href="<?= e($site['nav_cta']['href']) ?>"><?= e($site['nav_cta']['label']) ?></a>
        </nav>
    </div>
</header>

<main id="main">
