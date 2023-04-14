<?php

namespace App\Support;

class Route
{
    public static $app;

    public static function setup(&$app)
    {
        self::$app = $app;

        return $app;
    }

    public static function __callStatic($verb, $parameters)
    {
        $app = self::$app;

        [$route, $action] = $parameters;

        return $app->$verb($route, $action);
    }
}