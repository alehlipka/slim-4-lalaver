<?php

use App\Http\Controllers\WelcomeController;
use App\Support\Route;

Route::get('/example', [WelcomeController::class, 'apiExample']);

