<?php

return [
    'dependencies' => [
        'invokables' => [
            \ExpressiveMigrations\Contracts\DatabaseManager::class => 'database',
        ],
        'factories' => [
            \App\Support\Cache\Cache::class => \App\Support\Cache\CacheFactory::class
        ],
        'aliases' => [
            \AuthExpressive\Interfaces\DatabaseInterface::class => 'database',
        ]
    ]
];