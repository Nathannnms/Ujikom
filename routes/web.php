<?php

use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


// Route untuk menu Produk
Route::get('/iniproduk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk.create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk.store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk.edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk.update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{produks}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');


// Route untuk menu Penjualan
Route::get('/inipenjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan.create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan.store', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan.edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('/penjualan.update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/{produk}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::put('penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');


Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/initransaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');
Route::get('/trans', [TransaksiController::class, 'trans'])->name('trans');



// Route::get('/trans', [TransaksiController::class, 'trans'])->name('trans.index');

Route::resource('produk', ProdukController::class);


// Route untuk pengaturan login 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
