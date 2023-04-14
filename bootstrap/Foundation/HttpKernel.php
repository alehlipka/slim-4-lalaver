<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\LoadAliases;
use Boot\Foundation\Bootstrappers\LoadDebuggingPage;
use Boot\Foundation\Bootstrappers\LoadEnvironmentVariables;
use Boot\Foundation\Bootstrappers\LoadHttpMiddlewares;
use Boot\Foundation\Bootstrappers\LoadServiceProviders;

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
        'api' => [],
        'web' => []
    ];

    public array $bootstraps = [
        LoadEnvironmentVariables::class,
        LoadDebuggingPage::class,
        LoadAliases::class,
        LoadHttpMiddlewares::class,
        LoadServiceProviders::class
    ];
}
