<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\View;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class WelcomeController
{
    public function index(Request $request, View $view)
    {
        return $view('home.index');
    }

    public function name(Request $request, View $view, string $name)
    {
        return $view('home.name', compact('name'));
    }

    public function apiExample(Request $request, Response $response)
    {
        $user = User::first();

        if ($user->actingAs('Admin', 'User')) {
            $user->acting = 'administrator';
        }

        $response->getBody()->write(json_encode(['user_model' => $user]));

        return $response;
    }
}
