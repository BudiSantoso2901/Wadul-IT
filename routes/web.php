<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CekLaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\RuanganController;

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
    return view('welcome');
});

// untuk guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login-process', [AuthController::class, 'loginPost'])->name('login-process');

    // Tambahkan route untuk lupa password
    Route::get('/forgot-password', [AuthController::class, 'forgotPasswordPage'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordPage'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');

    Route::get('/laporan/last-ruangan', [LaporanController::class, 'getLastRuangan'])->name('laporan.last-ruangan');

    Route::get('/pelapor/search', [PelaporController::class, 'search'])->name('pelapor.search');

    Route::get('/laporan/success/{nomor_tiket}', [LaporanController::class, 'success'])->name('laporan.success');
    Route::get('/laporan/search', [LaporanController::class, 'search'])->name('laporan.search');
    Route::get('/laporan', [CekLaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cari', [CekLaporanController::class, 'cari'])->name('laporan.cari');
    Route::get('laporan/{nomor_tiket}', [CekLaporanController::class, 'showByTicket'])->name('laporan.detail');
});

// untuk user admin
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [ManajemenController::class, 'index'])->name('laporan.view');
    Route::get('/laporan/{id}/edit', [ManajemenController::class, 'editStatus'])->name('laporan.edit');
    Route::put('/laporan/{id}/update-status', [ManajemenController::class, 'updateStatus'])->name('laporan.updateStatus');
    //hapus laporan
    Route::delete('/laporan/hapus/{id}', [ManajemenController::class, 'destroy'])->name('laporan.hapus');
    Route::get('/ruangan', [RuanganController::class, 'ruangan'])->name('ruangan.index');
    Route::post('/ruangan/tambah', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('ruangan/{id}/edit', [RuanganController::class, 'show'])->name('ruangan.edit');
    Route::put('ruangan/{id}/update', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::delete('ruangan/delete/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

    //kategori
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.show');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });

    Route::prefix('pelapor')->group(function () {
        Route::get('/', [PelaporController::class, 'index'])->name('laporan.indexs');
        Route::post('/', [PelaporController::class, 'store'])->name('laporan.stores');
        Route::get('/{id}', [PelaporController::class, 'show'])->name('laporan.show');
        Route::put('/{id}', [PelaporController::class, 'update'])->name('laporan.update');
        Route::delete('/{id}', [PelaporController::class, 'destroy'])->name('laporan.destroy');
    });
});
