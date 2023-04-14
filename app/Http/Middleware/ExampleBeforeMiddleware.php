<?php

namespace App\Http\Middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ExampleBeforeMiddleware
{
    public function __invoke(Request $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);
        $body = (string) $response->getBody();
        $response = new Response;
        $response->getBody()->write("Before Middleware\n{$body}");

        return $response;
    }
}