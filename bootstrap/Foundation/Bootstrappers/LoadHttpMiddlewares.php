<?php

namespace Boot\Foundation\Bootstrappers;

use Boot\Foundation\Kernel;

class LoadHttpMiddlewares extends Bootstrapper
{
    public function boot()
    {
        $kernel = $this->app->getContainer()->get(Kernel::class);

        $this->app->getContainer()->set('middlewares', fn () => [
            'global' => $kernel->middlewares,
            'api' => $kernel->middlewareGroups['api'],
            'web' => $kernel->middlewareGroups['web']
        ]);
    }
}