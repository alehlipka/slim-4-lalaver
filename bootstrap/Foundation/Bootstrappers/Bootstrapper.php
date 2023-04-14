<?php

namespace Boot\Foundation\Bootstrappers;

use Slim\App;

class Bootstrapper
{
    final public function __construct(public App $app) {}

    final public static function setup(App $app, array $loaders)
    {
        $loaders = array_map(fn ($loader) => new $loader($app), $loaders);

        array_walk($loaders, fn (Bootstrapper $boot) => $boot->beforeBoot());
        array_walk($loaders, fn (Bootstrapper $boot) => $boot->boot());
        array_walk($loaders, fn (Bootstrapper $boot) => $boot->afterBoot());
    }

    public function beforeBoot()
    {

    }

    public function boot()
    {

    }

    public function afterBoot()
    {

    }
}