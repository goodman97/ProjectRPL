<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/hallodunia', [TestController::class, 'show']);

route::get('/login', [LoginController::class, 'show']);