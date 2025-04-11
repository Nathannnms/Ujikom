<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
{
    return view('transaksi.create');

}

public function store(Request $request, )
{
    
    $validated = $request->validate([
        'jenis' => 'required|string',
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    $transaksi = Transaksi::create($validated);

    return redirect()->route('transaksi.struk', $transaksi->transaksi_id)->with('success', 'Transaksi berhasil ditambahkan');
}

public function struk($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.struk', compact('transaksi'));
    }

    public function trans()
    {
        $totalPemasukan = Transaksi::where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = Transaksi::where('jenis', 'pengeluaran')->sum('jumlah');
        $transaksis = Transaksi::orderBy('tanggal', 'desc')->get();

        return view('trans', compact('totalPemasukan', 'totalPengeluaran', 'transaksis'));
    }
}
