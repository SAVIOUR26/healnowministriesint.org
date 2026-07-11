<?php
/**
 * Global site content: identity, navigation, contact details, footer.
 * Word-for-word from the live site (healnowministriesint.org).
 */
return [
    'name'        => 'Heal Now Ministries International',
    'short_name'  => 'HNMI',
    'tagline'     => 'Jesus Cares',
    'description' => 'Heal Now Ministries International (HNMI) is a dedicated organization committed to fostering a just and equitable society. Our mission is to empower communities through holistic programs.',
    'url'         => 'https://healnowministriesint.org',

    'nav' => [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'About', 'href' => '/about/'],
        ['label' => 'Programs', 'href' => '/what-we-do/'],
        ['label' => 'Online Radio', 'href' => '/online-radio/'],
        ['label' => 'Blog', 'href' => '/blog/'],
        ['label' => 'Get Involved', 'href' => '/get-involved/'],
        ['label' => 'Contact', 'href' => '/contact/'],
    ],
    'nav_cta' => ['label' => 'Donate', 'href' => '/donate/'],

    'contact' => [
        'address' => 'Ndejje Zanta, Wakiso, P.O BOX 168013, Kampala Uganda',
        'phones'  => ['+256 200 925429', '+256 783 936465'],
        'email'   => 'info@healnowministriesint.org',
    ],

    'social' => [
        ['label' => 'LinkedIn', 'href' => null],
        ['label' => 'Twitter', 'href' => null],
        ['label' => 'Facebook', 'href' => null],
        ['label' => 'YouTube', 'href' => 'https://www.youtube.com/channel/UCwWnYiHOKxG-2U_vkcdIIFA'],
        ['label' => 'WhatsApp', 'href' => 'https://wa.me/256783837750'],
    ],

    'footer_programs' => [
        "Children's Welfare",
        'Youth Empowerment',
        "Women's Support",
        'Elderly Care',
        'Community Projects',
        'Empower Young Mothers Initiative',
        'Renewable Energy',
    ],

    'copyright' => 'Heal Now Ministries International (HNMI)',
];
