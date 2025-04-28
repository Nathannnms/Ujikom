<?php
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

// Rute utama yang mengarah ke halaman login
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/tes-secret', function () {
//     dd(config('app.admin_secret'));
// });

// Memuat rute-rute autentikasi bawaan Laravel
require __DIR__.'/auth.php';

// Rute yang dapat diakses oleh semua user yang sudah login
Route::middleware('auth')->group(function () {
    // Rute struk transaksi bisa diakses oleh admin & pelanggan
    Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');

    // Rute untuk mengedit profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute khusus untuk role pelanggan
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    // Menampilkan daftar produk untuk pelanggan
    Route::get('/pelanggan', [ProdukController::class, 'daftarProdukPelanggan'])->name('pelanggan.index');

    // Proses pemesanan produk
    Route::post('/produk/pesan/{id}', [PelangganController::class, 'pesan'])->name('produk.pesan');
    Route::post('/keranjang/{produkId}', [PelangganController::class, 'addToCart'])->name('keranjang.add');

    // Halaman pembayaran
    Route::get('/pembayaran', [PelangganController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/store', [PelangganController::class, 'store'])->name('pembayaran.store');
});

// Rute khusus untuk role admin dengan prefix 'admin'
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // CRUD produk (kecuali tampilan detail)
    Route::get('/iniproduk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    
    // Manajemen penjualan
    Route::get('/inipenjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/{produk}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
    Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
    
    // Manajemen transaksi
    Route::get('/trans', [TransaksiController::class, 'trans'])->name('trans');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.index');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');
});