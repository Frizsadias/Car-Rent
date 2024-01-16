<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pengguna', App\Http\Controllers\PenggunaController::class)->middleware('auth');
Route::resource('cars', App\Http\Controllers\CarController::class);
Route::resource('peminjaman', App\Http\Controllers\Transaction\PeminjamanController::class);
Route::resource('pengembalian', App\Http\Controllers\Transaction\PengembalianController::class);
