<?php

namespace App\Support;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

class RouteGroup
{
    public App $app;
    public string $prefix;
    public string $routes;
    public array $middlewares = [];

    public function __construct(&$app)
    {
        $this->app = $app;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function setRoutes(string $path = '')
    {
        $this->routes = $path;

        return $this;
    }

    public function setMiddlewares(array $middlewares)
    {
        $this->middlewares = $middlewares;

        return $this;
    }

    public function register()
    {
        $group = $this->app->group($this->prefix, function (RouteCollectorProxy $group) {
            $app = Route::setup($group);

            require $this->routes;
        });

        array_walk($this->middlewares, fn ($middleware) => $group->add(new $middleware));

        Route::setup($this->app);
    }
}