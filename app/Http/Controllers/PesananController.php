<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::id())->latest()->get();
        return view('pelanggan.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('pelanggan.pesanan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total = $produk->harga * $request->jumlah;

        Pesanan::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
            'status' => 'pending', // default status
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }
}