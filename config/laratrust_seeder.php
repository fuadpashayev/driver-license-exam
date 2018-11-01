<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'editor' => [
            'users' => 'r',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
