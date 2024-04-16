<?php

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
Route::get('/TEST', function () {
    return view('testing');
});
Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store'])->name('postRegister');
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('postLogin');
});
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/pelanggan', \App\Http\Controllers\Admin\PelangganController::class);
    Route::resource('/pemilik', \App\Http\Controllers\Admin\PemilikController::class);
    Route::resource('/kendaraan', \App\Http\Controllers\Admin\KendaraanController::class)->names('admin.kendaraan');
    Route::resource('/tipe_kendaraan', \App\Http\Controllers\Admin\TipeKendaraanController::class);
    Route::resource('sewa', \App\Http\Controllers\Admin\SewaController::class)->names('admin.sewa');
    Route::resource('pembayaran', \App\Http\Controllers\Admin\PembayaranController::class)->names('admin.pembayaran');
    Route::resource('pengembalian', \App\Http\Controllers\Admin\PengembalianController::class)->names('admin.pengembalian');
    Route::get('sewa/verify/{uuid}', [App\Http\Controllers\Admin\SewaController::class, 'verify'])->name('admin.sewa.verify');
    Route::post('sewa/verify/{uuid}', [App\Http\Controllers\Admin\SewaController::class, 'storeVerify'])->name('admin.sewa.verify');
});
Route::prefix('/owner')->middleware(['auth', 'role:owner'])->group(function () {
    Route::resource('/kendaraan', \App\Http\Controllers\Owner\KendaraanController::class)->names('owner.kendaraan');
});

Route::prefix('/user')->middleware(['auth', 'role:user'])->group(function () {
    Route::resource('/order', \App\Http\Controllers\User\OrderController::class);
    Route::resource('/sewa', \App\Http\Controllers\User\SewaController::class);
    Route::resource('/bayar', \App\Http\Controllers\User\BayarController::class);

});
