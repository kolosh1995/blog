<?php
return [
    'permAdminPanel' => [
        'type' => 2,
        'description' => 'Admin panel',
    ],
    'permUserPanel' => [
        'type' => 2,
        'description' => 'User panel',
    ],
    'user' => [
        'type' => 1,
        'description' => 'User',
        'children' => [
            'permUserPanel',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Admin',
        'children' => [
            'user',
            'permAdminPanel',
        ],
    ],
];
