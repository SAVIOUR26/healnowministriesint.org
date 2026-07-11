<?php
/**
 * Shared bootstrap for every page in /public/. Not web-accessible itself
 * (lives outside the docroot), only ever require()'d.
 */

define('ROOT_DIR', __DIR__);
define('CONTENT_DIR', ROOT_DIR . '/content');
define('TEMPLATES_DIR', ROOT_DIR . '/templates');

require TEMPLATES_DIR . '/components.php';
require TEMPLATES_DIR . '/icons.php';

/** Escape a string for safe HTML output. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/** Load a content array from /content/. */
function site_content(): array
{
    static $site = null;
    if ($site === null) {
        $site = require CONTENT_DIR . '/site.php';
    }
    return $site;
}

function page_content(string $slug): array
{
    return require CONTENT_DIR . "/pages/{$slug}.php";
}

function post_content(string $slug): ?array
{
    $path = CONTENT_DIR . "/posts/{$slug}.php";
    return is_file($path) ? require $path : null;
}

/** @return array<int, array> all posts, in the same order as blog.php's index */
function all_posts(): array
{
    $blog = page_content('blog');
    return array_map('post_content', $blog['posts']);
}

/** Cache-busted asset URL. */
function asset(string $path): string
{
    $full = ROOT_DIR . '/assets/' . ltrim($path, '/');
    $version = is_file($full) ? filemtime($full) : time();
    return '/assets/' . ltrim($path, '/') . '?v=' . $version;
}

/** Render a template partial with variables available to it. */
function render(string $template, array $vars = []): void
{
    extract($vars);
    require TEMPLATES_DIR . '/' . $template;
}

/** Is the given nav href the currently active page? */
function is_active(string $href): bool
{
    $current = $_SERVER['REQUEST_URI'] ?? '/';
    $current = strtok($current, '?');
    if ($href === '/') {
        return $current === '/';
    }
    return substr($current, 0, strlen($href)) === $href;
}
