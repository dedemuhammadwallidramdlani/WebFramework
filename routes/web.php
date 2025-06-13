<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\EkstraksiController;
use App\Http\Controllers\PencampuranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('bahanbaku', BahanbakuController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('gudang', GudangController::class);
    Route::resource('ekstraksi', EkstraksiController::class);
    Route::resource('pencampuran', PencampuranController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/laporan.index', [TransaksiController::class, 'laporan'])->name('laporan.index');
    Route::get('/laporan.pdf', [TransaksiController::class, 'exportPdf'])->name('laporan.pdf');
    Route::get('/laporan.excel', [TransaksiController::class, 'exportExcel'])->name('laporan.excel');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
