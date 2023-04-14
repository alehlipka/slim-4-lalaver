<?php

namespace App\Providers;

use Psr\Container\ContainerInterface;
use Slim\App;

abstract class ServiceProvider
{
    public ContainerInterface $container;

    final public function __construct(public App &$app)
    {
        $this->container = $this->app->getContainer();
    }

    abstract public function register();

    abstract public function boot();

    public function bind(string $key, callable $resolvable)
    {
        $this->container->set($key, $resolvable);
    }

    public function resolve(string $key)
    {
        return $this->container->get($key);
    }

    final public static function setup(App &$app, array $providers)
    {
        $providers = array_map(fn($provider) => new $provider($app), $providers);

        array_walk($providers, fn(ServiceProvider $provider) => $provider->register());
        array_walk($providers, fn(ServiceProvider $provider) => $provider->boot());
    }
}