<?php
/**
 * Contact page content — word-for-word from the live site's /contact/ page.
 */
return [
    'meta' => [
        'title'       => 'Contact – Heal Now Ministries International',
        'description' => 'Get in touch with Heal Now Ministries International. Ndejje Zanta, Wakiso, Kampala Uganda.',
    ],

    'title'   => 'Contact',
    'heading' => 'Get in touch',

    'form_heading' => 'Message us',
    'form' => [
        'action' => '/contact/',
        'method' => 'post',
        'fields' => [
            ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text', 'required' => true],
            ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text', 'required' => true],
            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
            ['name' => 'message', 'label' => 'Message', 'type' => 'textarea', 'required' => true],
        ],
        'submit_label' => 'Submit',
    ],
];
