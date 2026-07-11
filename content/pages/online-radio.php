<?php
/**
 * Online Radio page content — from the live site's /online-radio/ page.
 * The live page embeds a third-party radio-player plugin with no
 * discoverable static stream URL (see SITE-MAP.md); rebuild ships the
 * same visual identity with a placeholder HTML5 audio player.
 */
return [
    'meta' => [
        'title'       => 'Online Radio – Heal Now Ministries International',
        'description' => 'Listen to Heal Now Ministries International online radio.',
    ],

    'title' => 'HEAL NOW',
    'logo'  => '/assets/images/radio-logo.webp',
    'stream_url' => null,
    'note' => 'Live stream coming soon — check back shortly.',
];
