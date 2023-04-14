<?php

namespace Boot\Foundation\Bootstrappers;

use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;

class LoadDebuggingPage extends Bootstrapper
{
    public function boot()
    {
        if (config('app.debug'))
        {
            $this->app->add(new WhoopsMiddleware());
        }
    }
}