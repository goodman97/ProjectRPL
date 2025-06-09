<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ControllerSiswa;

Route::get('/', function () {
    return view('welcome');
});

route::get('/hallodunia', [TestController::class, 'show']);

route::get('/login', [LoginController::class, 'show']);

Route::get('/login', [ControllerSiswa::class, 'showLoginForm'])->name('login');
Route::post('/login', [ControllerSiswa::class, 'login']);

Route::get('/dashboard', function () {
    if (!session()->has('siswa_id')) {
        return redirect('/login');
    }
    return 'Selamat datang, ' . session('nama_siswa');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});
