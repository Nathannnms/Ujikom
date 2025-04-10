<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('inipenjualan', compact('penjualans'));
    }

    public function create()
    {
        $penggunas = Pengguna::with('user')->get();
        $produks = Produk::all(); 
        return view('penjualan.create', compact('penggunas', 'produks'));
    }

    public function store(Request $request)
{
    $request->validate([
        'total_harga' => 'required|integer',
        'tanggal_penjualan' => 'required|date',
        'pengguna_id' => 'required|exists:penggunas,pengguna_id',
        'produk_id' => 'required|exists:produks,produk_id',
        'informasi_harga' => 'required|numeric',
        'jumlah_produk' => 'required|integer|min:1',
    ]);

    // Simpan penjualan dulu dan ambil objeknya
    $penjualan = Penjualan::create([
        'total_harga' => $request->total_harga,
        'tanggal_penjualan' => $request->tanggal_penjualan,
        'pengguna_id' => $request->pengguna_id,
    ]);

    // Baru bisa akses penjualan_id
    Detail::create([
        'penjualan_id' => $penjualan->penjualan_id,
        'produk_id' => $request->produk_id,
        'informasi_harga' => $request->informasi_harga,
        'jumlah_produk' => $request->jumlah_produk,
    ]);

    return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan');
}
    public function show($id)
    {
        $penjualan = Penjualan::with('details.produk')->findOrFail($id);
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::with('details')->findOrFail($id); 
        $penggunas = Pengguna::with('user')->get();
        $produks = Produk::all(); 
    
        return view('penjualan.edit', compact('penjualan', 'penggunas', 'produks'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'total_harga' => 'required|integer',
        'tanggal_penjualan' => 'required|date',
        'pengguna_id' => 'required|exists:penggunas,pengguna_id',
        'produk_id' => 'required|exists:produks,produk_id',
        'informasi_harga' => 'required|numeric',
        'jumlah_produk' => 'required|integer|min:1',
    ]);

    $penjualan = Penjualan::findOrFail($id);
    $penjualan->update([
        'total_harga' => $request->total_harga,
        'tanggal_penjualan' => $request->tanggal_penjualan,
        'pengguna_id' => $request->pengguna_id,
    ]);

    // Update detail (dihapus & dibuat ulang, atau bisa di-update langsung jika lebih kompleks)
    $penjualan->details()->delete();

    Detail::create([
        'penjualan_id' => $penjualan->penjualan_id,
        'produk_id' => $request->produk_id,
        'informasi_harga' => $request->informasi_harga,
        'jumlah_produk' => $request->jumlah_produk,
    ]);

    return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diubah');
}


    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus');
    }
}
