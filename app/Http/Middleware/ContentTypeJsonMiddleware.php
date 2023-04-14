<?php

namespace App\Http\Middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ContentTypeJsonMiddleware
{
    public function __invoke(Request $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);

        return $response->withHeader('Content-Type', 'application/json');
    }
}