<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once base_path('bootstrap/app.php');

return [
    'paths' => [
        'migrations' => database_path('migrations'),
        'seeds' => database_path('seeders')
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'lalaver',
        'lalaver' => [
            'adapter' => 'mysql',
            'host' => env('DB_HOST'),
            'name' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'port' => env('DB_PORT'),
            'charset' => 'utf8mb4',
        ],
    ],

    'version_order' => 'creation'
];
