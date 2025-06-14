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
Route::get('/editprofilesiswa', [ControllerSiswa::class, 'editProfile'])->name('editprofilesiswa');
Route::post('/updateprofilesiswa', [ControllerSiswa::class, 'updateProfile'])->name('updateprofilesiswa');

Route::get('/dashboardguru', [ControllerGuru::class, 'dashboard'])->name('dashboardguru');
Route::get('/inputkelasguru', [ControllerGuru::class, 'inputKelas'])->name('inputkelasguru');
Route::get('/inputjadwalguru', [ControllerGuru::class, 'inputJadwal'])->name('inputjadwalguru');
Route::get('/lihatlabguru', [ControllerGuru::class, 'infoLab'])->name('lihatlabguru');
Route::get('/lihatlaporanguru', [ControllerGuru::class, 'infoLaporan'])->name('lihatlaporanguru');
Route::get('/profileguru', [ControllerGuru::class, 'profil'])->name('profileguru');
Route::get('/editprofileguru', [ControllerGuru::class, 'editProfile'])->name('editprofileguru');
Route::post('/updateprofileguru', [ControllerGuru::class, 'updateProfile'])->name('updateprofileguru');

Route::get('/dashboardoperator', [ControllerOperator::class, 'dashboard'])->name('dashboardoperator');
Route::get('/lihatjadwal', [ControllerOperator::class, 'lihatjadwal']);
Route::get('/accjadwal', [ControllerOperator::class, 'accjadwal']);
Route::get('/infoakun', [ControllerOperator::class, 'infoakun']);
Route::get('/infolab', [ControllerOperator::class, 'statusLab'])->name('statuslab');
Route::post('/infolab/update', [ControllerOperator::class, 'updateStatusLab'])->name('statuslab.update');
Route::get('/profile', [ControllerOperator::class, 'profile'])->name('profile');
Route::get('/editprofileoperator', [ControllerOperator::class, 'editProfile'])->name('editprofileoperator');
Route::post('/updateprofileoperator', [ControllerOperator::class, 'updateProfile'])->name('updateprofileoperator');