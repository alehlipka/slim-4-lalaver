<?php

namespace App\Http;

use App\Http\Middleware\ContentTypeJsonMiddleware;
use App\Http\Middleware\ExampleAfterMiddleware;
use App\Http\Middleware\ExampleBeforeMiddleware;
use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /**
     * Global Middlewares
     *
     * @var array
     */
    public array $middlewares = [];

    /**
     * Route Group Middlewares
     *
     * @var array|array[]
     */
    public array $middlewareGroups = [
        'api' => [
            ContentTypeJsonMiddleware::class
        ],
        'web' => [
            ExampleBeforeMiddleware::class,
            ExampleAfterMiddleware::class
        ]
    ];
}