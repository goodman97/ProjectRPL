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

Route::get('/dashboardsiswa', [ControllerSiswa::class, 'dashboard'])->name('dashboardsiswa');
Route::get('/lihatjadwalsiswa', [ControllerSiswa::class, 'lihatJadwal']);
Route::get('/lihatlabsiswa', [ControllerSiswa::class, 'infoLab'])->name('lihatlabsiswa');
Route::get('/buatlaporansiswa', [ControllerSiswa::class, 'buatLaporan']);
Route::get('/lihatlaporansiswa', [ControllerSiswa::class, 'lihatLaporan']);
Route::get('/profilesiswa', [ControllerSiswa::class, 'profil'])->name('profilesiswa');

Route::get('/dashboardguru', [ControllerGuru::class, 'dashboard'])->name('dashboardguru');
Route::get('/inputkelasguru', [ControllerGuru::class, 'inputKelas']);
Route::get('/inputjadwalguru', [ControllerGuru::class, 'inputJadwal']);
Route::get('/lihatlabguru', [ControllerGuru::class, 'infoLab'])->name('lihatlabguru');
Route::get('/lihatlaporanguru', [ControllerGuru::class, 'infoLaporan']);
Route::get('/profileguru', [ControllerGuru::class, 'profil'])->name('profileguru');

Route::get('/dashboardoperator', [ControllerOperator::class, 'dashboard'])->name('dashboardoperator');
Route::get('/lihatjadwal', [ControllerOperator::class, 'lihatjadwal']);
Route::get('/accjadwal', [ControllerOperator::class, 'accjadwal']);
Route::get('/infoakun', [ControllerOperator::class, 'infoakun']);
Route::get('/infolab', [ControllerOperator::class, 'statusLab'])->name('statuslab');
Route::post('/infolab/update', [ControllerOperator::class, 'updateStatusLab'])->name('statuslab.update');
Route::get('/profile', [ControllerOperator::class, 'profile'])->name('profile');