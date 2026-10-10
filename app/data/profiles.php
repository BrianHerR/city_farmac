<?php

return [
    [
        'id' => 1,
        'name' => 'Cliente',
        'permissions' => [],
        'active' => true,
    ],

    [
        'id' => 2,
        'name' => 'Administrador',
        'permissions' => [
            'dashboard',
            'products',
            'categories',
            'brands',
            'comments',
        ],
        'active' => true,
    ],

    [
        'id' => 3,
        'name' => 'Super Administrador',
        'permissions' => [
            'dashboard',
            'products',
            'categories',
            'brands',
            'comments',
            'users',
            'profiles',
        ],
        'active' => true,
    ],
];