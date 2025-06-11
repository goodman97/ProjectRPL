<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ControllerSiswa;
use App\Http\Controllers\ControllerOperator;
use App\Http\Controllers\ControllerGuru;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/hallodunia', [TestController::class, 'show']);

Route::get('/login', [LoginController::class, 'show']);

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
});*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboardsiswa', [ControllerSiswa::class, 'dashboard']);

Route::get('/dashboardguru', [ControllerGuru::class, 'dashboard'])->name('dashboardguru');
Route::get('/inputkelasguru', [ControllerGuru::class, 'inputKelas']);
Route::get('/inputjadwalguru', [ControllerGuru::class, 'inputJadwal']);
Route::get('/lihatlabguru', [ControllerGuru::class, 'infoLab']);
Route::get('/lihatlaporanguru', [ControllerGuru::class, 'infoLaporan']);
Route::get('/profileguru', [ControllerGuru::class, 'profil'])->name('profileguru');

Route::get('/dashboardoperator', [ControllerOperator::class, 'dashboard']);
Route::get('/lihatjadwal', [ControllerOperator::class, 'lihatjadwal']);
Route::get('/accjadwal', [ControllerOperator::class, 'accjadwal']);
Route::get('/infolab', [ControllerOperator::class, 'infolab']);
Route::get('/infoakun', [ControllerOperator::class, 'infoakun']);
Route::get('/statuslab', [ControllerOperator::class, 'statusLab'])->name('statuslab');
Route::post('/statuslab/update', [ControllerOperator::class, 'updateStatusLab'])->name('statuslab.update');