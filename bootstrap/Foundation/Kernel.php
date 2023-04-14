<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\Bootstrapper;
use Slim\App;

abstract class Kernel
{
    public array $bootstraps = [];

    public function __construct(public App $app)
    {
        $this->app->getContainer()->set(self::class, $this);

        Bootstrapper::setup($this->app, $this->bootstraps);
    }

    public static function bootstrap(App &$app)
    {
        return new static($app);
    }

    public function getApplication(): App
    {
        return $this->app;
    }
}