<?php
/**
 * Donate page content — word-for-word from the live site's /donate/ page.
 */
return [
    'meta' => [
        'title'       => 'Donate – Heal Now Ministries International',
        'description' => 'Your donation helps Heal Now Ministries International build schools, provide healthcare, empower young mothers, and care for the elderly in Uganda.',
    ],

    'intro' => 'At Heal Now Ministries International, every donation brings us one step closer to realizing our vision of a self-sustaining, empowered, and spiritually enriched community. Your generosity fuels our programs, providing essential services to children, young mothers, and the elderly in Uganda.',

    'why_donate' => [
        'heading' => 'Why Donate?',
        'intro'   => 'Your donations help us:',
        'items'   => [
            'Build and equip schools for children in underserved communities.',
            'Provide healthcare and essential needs to vulnerable individuals.',
            'Empower young mothers with skills and support.',
            'Care for the elderly, ensuring they live with dignity and respect.',
        ],
        'closing' => 'Every contribution, no matter the size, makes a profound difference in the lives of those we serve.',
    ],

    'how_to_donate' => [
        'heading' => 'How to Donate',
        'body'    => 'We’ve made it easy for you to support our mission. You can donate securely online using your credit card, mobile money, or bank transfer. Simply click the "Donate Now" button or scan the QR Code to get started.',
        'cta'     => ['label' => 'Donate Now', 'href' => 'https://www.paypal.com/donate/?hosted_button_id=WZXXEQM9MVSXS'],
        'qr_image' => '/assets/images/donate-qr.webp',
    ],

    'bank_transfer' => [
        'heading' => 'Bank Transfer Details:',
        'items' => [
            'Bank Name: Equity Bank',
            'Account Name: Heal Now Ministries International Ltd',
            'Account Number: 1003201270009',
            'Branch: KATWE',
            'Swift Code: EQBLUGKA',
        ],
    ],

    'donation_options' => [
        'heading' => 'Donation Options',
        'items' => [
            [
                'title' => 'One-Time Donation',
                'body'  => 'Make a one-time donation to support our ongoing programs. Your gift will be used where it’s needed most, ensuring the greatest impact.',
            ],
            [
                'title' => 'Monthly Giving',
                'body'  => 'Join our community of monthly donors and provide steady, reliable support for our work. Monthly giving is an easy and efficient way to make a lasting difference.',
            ],
            [
                'title' => 'In-Kind Donations',
                'body'  => 'We also welcome donations of goods and services. Whether it’s clothing, food, medical supplies, or professional expertise, your in-kind donations are invaluable to our efforts.',
            ],
        ],
    ],

    'impact' => [
        'heading' => 'Impact of Your Donation',
        'intro'   => 'Your donation can:',
        'items'   => [
            'Provide a child with a month of schooling and meals.',
            'Supply a young mother with the training she needs to start her own business.',
            'Fund healthcare services for elderly community members.',
        ],
        'image' => '/assets/images/donate-thankyou.webp',
    ],
];
