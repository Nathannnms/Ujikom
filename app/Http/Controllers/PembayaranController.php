<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Detail;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Gunakan Auth facade atau helper auth() secara konsisten
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
    }

    // Validasi input
    $request->validate([
        'alamat' => 'required|string',
        'nomor_telepon' => 'required|string',
        'produk_id' => 'required|array',
        'produk_id.*' => 'exists:produks,produk_id',
        'jumlah' => 'required|array',
        'jumlah.*' => 'numeric|min:1',
    ]);

    // Menghitung total harga
    $total_harga = 0;
    $produk_ids = $request->produk_id;
    $jumlahs = $request->jumlah;

    foreach ($produk_ids as $index => $produkId) {
        $produk = Produk::findOrFail($produkId);
        $jumlah = $jumlahs[$index];

        if ($produk->stock < $jumlah) {
            return back()->with('error', "Stok produk {$produk->nama_produk} tidak cukup.");
        }

        $total_harga += $produk->harga * $jumlah;
    }

    // Dapatkan user yang terautentikasi
    $user = Auth::user();

    // Menyimpan data transaksi
    $penjualan = Penjualan::create([
        'pengguna_id' => $user->id,
        'total_harga' => $total_harga,
        'alamat' => $request->alamat,
        'nomor_telepon' => $request->nomor_telepon,
        'tanggal' => now(),
    ]);

    // Menyimpan detail transaksi
    foreach ($produk_ids as $index => $produkId) {
        $produk = Produk::findOrFail($produkId);
        $jumlah = $jumlahs[$index];

        Detail::create([
            'penjualan_id' => $penjualan->penjualan_id,
            'produk_id' => $produkId,
            'jumlah' => $jumlah,
            'informasi_harga' => $produk->harga,
        ]);

        $produk->decrement('stock', $jumlah);
    }

    // Catat transaksi pemasukan
    Transaksi::create([
        'tanggal' => now(),
        'jenis' => 'pemasukan',
        'jumlah' => $total_harga,
        'keterangan' => 'Pembayaran dari ' . $user->name,
    ]);

    return redirect()->route('struk', $penjualan->penjualan_id);
}




    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
