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
//Route::get('/', function () {
//    return view('testing');
//});
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

Route::get('/as', [LandingPageController::class, 'index2'])->name('landingpage');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store'])->name('postRegister');
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('postLogin');
});
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::prefix('/admin')->middleware(['auth','role:admin'])->group(function () {
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/pelanggan', \App\Http\Controllers\Admin\PelangganController::class);
    Route::resource('/pemilik', \App\Http\Controllers\Admin\PemilikController::class);
    Route::resource('/kendaraan', \App\Http\Controllers\Admin\KendaraanController::class)->names('admin.kendaraan');
    Route::resource('/tipe_kendaraan', \App\Http\Controllers\Admin\TipeKendaraanController::class);
    Route::resource('sewa',\App\Http\Controllers\Admin\SewaController::class)->names('admin.sewa');
});
Route::prefix('/owner')->middleware(['auth','role:owner'])->group(function () {
    Route::resource('/kendaraan', \App\Http\Controllers\Owner\KendaraanController::class)->names('owner.kendaraan');
});
