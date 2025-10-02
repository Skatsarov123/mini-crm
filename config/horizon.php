<?php

return [
    'defaults' => [
        'supervisor-1' => [
            'connection' => 'redis',
            'queue' => ['default', 'emails', 'reports'],
            'balance' => 'auto',
            'processes' => 3,
            'tries' => 3,
        ],
    ],
];
