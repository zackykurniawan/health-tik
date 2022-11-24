<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ArtikelController::class, 'tampil']);

Route::middleware(['auth'])->group(function () {
    // crud kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('delkat/{kategori}', [KategoriController::class, 'destroy']);

    // crud artikel
    Route::resource('artikel', ArtikelController::class);
    Route::get('delart/{artikel}', [ArtikelController::class, 'destroy']);

    // crud user
    Route::resource('user', UserController::class);
    Route::get('delus/{user}', [UserController::class, 'destroy']);

    // create read bmi
    Route::resource('bmi', BmiController::class);
});

Route::middleware(['auth', ])->group(function () {
    // crud kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('delkat/{kategori}', [KategoriController::class, 'destroy']);

    // crud artikel
    Route::resource('artikel', ArtikelController::class);
    Route::get('delart/{artikel}', [ArtikelController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
