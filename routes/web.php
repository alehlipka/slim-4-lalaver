<?php

use App\Http\Controllers\WelcomeController;
use App\Support\Route;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/{name}', [WelcomeController::class, 'name']);

