<?php

namespace App\Support;

use Jenssegers\Blade\Blade;
use Slim\Psr7\Response;

class View
{
    public function __construct(public Response $response) {}

    public function __invoke(string $template, array $with = []): Response
    {
        $cache = config('blade.cache');
        $views = config('blade.views');

        $blade = (new Blade($views, $cache))->make($template, $with);

        $this->response->getBody()->write($blade->render());

        return $this->response;
    }
}
