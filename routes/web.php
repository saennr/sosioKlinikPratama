<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\JanjiController;
use App\Http\Controllers\JadwalController;

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

Route::post('/beranda', [LoginController::class, 'beranda'])->name('login.proses');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/daftar', [LoginController::class, 'register'])->name('register');
Route::post('daftar', [LoginController::class, 'register_proses'])->name('register.proses');

Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan');

Route::get('/profileuser', [ProfileController::class, 'index'])->name('profileuser');
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::get('/janji', [JanjiController::class, 'janji'])->name('janji');

Route::get('/jadwal', [JadwalController::class, 'jadwal'])->name('jadwal');

