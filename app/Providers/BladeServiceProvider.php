<?php

namespace App\Providers;

use App\Support\View;
use Slim\Psr7\Response;

class BladeServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->getContainer()->set(View::class, function () {
            return new View(new Response);
        });
    }

    public function boot()
    {
    }
}
