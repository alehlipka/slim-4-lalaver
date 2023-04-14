<?php

return [
    'name' => env('APP_NAME', ''),
    'debug' => env('APP_DEBUG', false),
    'web_prefix' => env('WEB_PREFIX', ''),
    'api_prefix' => env('API_PREFIX', '/api'),

    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
    ],

    'aliases' => [
        'DB' => \Illuminate\Database\Capsule\Manager::class,
    ]
];
