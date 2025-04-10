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
    Transaksi::create($request->all());
    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
}
}
