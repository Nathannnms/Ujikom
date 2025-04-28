<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('penjualan')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        // Jika tidak punya view create, redirect aja ke index
        return redirect()->route('transaksi.index');
    }

    public function store(Request $request)
    {
        // Validasi input transaksi
        $validated = $request->validate([
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'penjualan_id' => 'nullable|exists:penjualans,penjualan_id',
        ]);
    
        // Simpan transaksi baru
        $transaksi = Transaksi::create($validated);
    
        // Jika jenis pengeluaran & ada penjualan, maka kurangi stok produk
        if ($request->jenis === 'pengeluaran' && $request->penjualan_id) {
            $penjualan = Penjualan::with('details.produk')->find($request->penjualan_id);
            foreach ($penjualan->details as $detail) {
                $produk = $detail->produk;
                $produk->stock -= $detail->jumlah_produk; // Pastikan detail memiliki 'jumlah_produk'
                $produk->save();
            }
        }
    
        return redirect()->route('transaksi.struk', $transaksi->transaksi_id)
                         ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function trans(Request $request)
    {
        $totalPemasukan = Transaksi::where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = Transaksi::where('jenis', 'pengeluaran')->sum('jumlah');

        $query = Transaksi::orderBy('tanggal', 'desc');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('keterangan', 'like', '%' . $cari . '%')
                  ->orWhere('jenis', 'like', '%' . $cari . '%')
                  ->orWhere('tanggal', 'like', '%' . $cari . '%');
            });
        }

        $transaksis = $query->get();

        return view('trans', compact('totalPemasukan', 'totalPengeluaran', 'transaksis'));
    }
}
