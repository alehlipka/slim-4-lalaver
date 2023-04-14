<?php

namespace App\Providers;

use App\Support\Route;
use App\Support\RouteGroup;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::setup($this->app);

        $this->bind(RouteGroup::class, fn () => new RouteGroup($this->app));
    }

    public function boot()
    {
        $this->apiRouteGroup()->register();
        $this->webRouteGroup()->register();
    }

    public function webRouteGroup(): RouteGroup
    {
        $routes = routes_path('web.php');
        $middlewares = $this->resolve('middlewares');
        $group = $this->resolve(RouteGroup::class);

        return $group->setRoutes($routes)->setPrefix(config('app.web_prefix'))->setMiddlewares([
            ...$middlewares['global'],
            ...$middlewares['web'],
        ]);
    }

    public function apiRouteGroup(): RouteGroup
    {
        $routes = routes_path('api.php');
        $middlewares = $this->resolve('middlewares');
        $group = $this->resolve(RouteGroup::class);

        return $group->setRoutes($routes)->setPrefix(config('app.api_prefix'))->setMiddlewares([
            ...$middlewares['global'],
            ...$middlewares['api'],
        ]);
    }
}