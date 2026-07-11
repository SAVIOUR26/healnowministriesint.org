<?php
/**
 * Small inline SVG icon set (stroke-based, currentColor) — no icon font,
 * no external request. Keep new icons in this same minimal style:
 * viewBox 0 0 24 24, stroke-width 1.8, round joins.
 */

function icon(string $name, string $class = 'icon'): string
{
    $paths = [
        'heart' => '<path d="M12 20.5s-7.5-4.6-10-9.3C.4 8.1 2 4.5 5.4 4c2-.3 3.9.6 5 2.2C11.6 4.6 13.4 3.7 15.4 4c3.4.5 5 4.1 3.4 7.2-2.5 4.7-10 9.3-10 9.3z"/>',
        'graduation-cap' => '<path d="M2 9.5 12 5l10 4.5-10 4.5-10-4.5Z"/><path d="M6 12v4.5c0 1 2.7 2.5 6 2.5s6-1.5 6-2.5V12"/><path d="M21 10v5.5"/>',
        'users' => '<circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><circle cx="17" cy="9.5" r="2.6"/><path d="M15.5 14.2c2.6.4 4.5 2.7 4.5 5.3"/>',
        'shield-check' => '<path d="M12 3.5 5 6v5.5c0 4.4 3 7.7 7 9.5 4-1.8 7-5.1 7-9.5V6l-7-2.5Z"/><path d="m9 12 2 2 4-4.5"/>',
        'map-pin' => '<path d="M12 21s7-6.6 7-12A7 7 0 0 0 5 9c0 5.4 7 12 7 12Z"/><circle cx="12" cy="9" r="2.4"/>',
        'phone' => '<path d="M6 3.5 9 4l1 3.5-2 1.6c.9 2.1 2.4 3.6 4.5 4.5l1.6-2 3.5 1v3c0 1-.8 1.8-1.8 1.7C9.7 16.6 4.4 11.3 3.8 5.3 3.7 4.3 4.5 3.5 5.5 3.5Z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 6.5 8 6 8-6"/>',
        'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
        'arrow-right' => '<path d="M4.5 12h15"/><path d="m13 5.5 6.5 6.5-6.5 6.5"/>',
        'facebook' => '<path d="M15 8.5h2V5.2c-.4 0-1.7-.1-3.2-.1-3.2 0-4.8 1.9-4.8 4.6v2.6H6v3.5h3v7.7h3.7v-7.7h3.2l.5-3.5h-3.7V9.9c0-.9.3-1.4 1.6-1.4Z"/>',
        'twitter' => '<path d="M20 6.4c-.6.3-1.3.5-2 .6.7-.5 1.2-1.2 1.5-2-.7.4-1.5.7-2.3.9A3.6 3.6 0 0 0 11 8.9c0 .3 0 .6.1.8-3-.1-5.6-1.5-7.4-3.7-.3.6-.5 1.2-.5 2 0 1.3.6 2.4 1.6 3.1-.6 0-1.1-.2-1.6-.4v.1c0 1.8 1.3 3.3 3 3.7-.3.1-.6.1-1 .1l-.7-.1c.5 1.5 1.9 2.5 3.5 2.6A7.3 7.3 0 0 1 3 18.6a10.2 10.2 0 0 0 5.6 1.6c6.7 0 10.4-5.6 10.4-10.4v-.5c.7-.5 1.3-1.2 1.8-1.9Z"/>',
        'linkedin' => '<rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 10v7"/><circle cx="7.5" cy="7" r=".3" fill="currentColor" stroke-width="1.6"/><path d="M11.5 17v-4.2c0-1.5 1-2.4 2.3-2.4 1.2 0 2.2.8 2.2 2.4V17"/><path d="M11.5 10v7"/>',
        'youtube' => '<rect x="2.5" y="6" width="19" height="12" rx="3"/><path d="m10.5 9.5 5 2.5-5 2.5Z" fill="currentColor" stroke="none"/>',
        'whatsapp' => '<path d="M6.5 17.5 4 20l2.6-2.4A8 8 0 1 1 12 20a8 8 0 0 1-5.5-2.5Z"/><path d="M9 9.5c0 3 2.5 5.5 5.5 5.5.6 0 1-.5.8-1l-.6-1.4c-.1-.4-.6-.5-1-.3l-.7.4a5 5 0 0 1-2.7-2.7l.4-.7c.2-.4.1-.9-.3-1L9.9 8c-.5-.2-1 .2-1 .8Z" fill="currentColor" stroke="none"/>',
    ];

    if (!isset($paths[$name])) {
        return '';
    }

    return sprintf(
        '<svg class="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
        e($class),
        $paths[$name]
    );
}
