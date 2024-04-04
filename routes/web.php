<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/', function () {
//     return view('testing');
// });
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

Route::get('/as', [LandingPageController::class, 'index2'])->name('landingpage');
//login
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('postLogin');
Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::resource('/pelanggan', \App\Http\Controllers\PelangganController::class);
Route::resource('/pemilik', \App\Http\Controllers\PemilikController::class);
