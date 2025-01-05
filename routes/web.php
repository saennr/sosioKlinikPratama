<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\JanjiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\RiwayatReservasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return view('index');
});

Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login.proses');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/daftar', [LoginController::class, 'register'])->name('register');
Route::post('/check-no-identitas', [LoginController::class, 'checkNoIdentitas']);
Route::post('daftar', [LoginController::class, 'register_proses'])->name('register.proses');

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [HalamanUtamaController::class, 'beranda'])->name('beranda');

    Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan');

    Route::get('/profileuser', [ProfileController::class, 'index'])->name('profileuser');
    Route::post('/profileuser', [ProfileController::class, 'update'])->name('profileUpdate');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

    Route::get('/janji', [JanjiController::class, 'janji'])->name('janji');
    Route::get('/getDokterBySpesialis/{idSpesialis}', [JanjiController::class, 'getDokterBySpesialis']);
    Route::get('/getJadwalByDokter/{idDokter}', [JanjiController::class, 'getJadwalByDokter']);
    Route::post('/janji', [JanjiController::class, 'storeJanji'])->name('janji');


    Route::get('/jadwal', [JadwalController::class, 'jadwal'])->name('jadwal');

    Route::get('/informasi', [InformasiController::class, 'informasi'])->name('informasi');

    Route::get('/reservasi-aktif', [RiwayatReservasiController::class, 'reservasiAktif'])->name('reservasiAktif');
    Route::get('/riwayat-pendaftaran', [RiwayatReservasiController::class, 'riwayatPendaftaran'])->name('riwayatPendaftaran');
});



