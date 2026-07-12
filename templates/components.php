<?php
/**
 * Small reusable render helpers shared across page templates.
 */

function btn(string $label, string $href, string $variant = 'primary'): string
{
    $external = substr($href, 0, 4) === 'http' ? ' target="_blank" rel="noopener"' : '';
    return sprintf(
        '<a class="btn btn--%s" href="%s"%s>%s%s</a>',
        e($variant),
        e($href),
        $external,
        e($label),
        icon('arrow-right', 'icon btn__arrow')
    );
}

/** Renders a <picture> with a webp source (all our converted assets are webp). */
function img(string $src, string $alt = '', string $class = '', string $loading = 'lazy'): string
{
    return sprintf(
        '<img class="%s" src="%s" alt="%s" loading="%s" decoding="async">',
        e($class),
        e($src),
        e($alt),
        e($loading)
    );
}
