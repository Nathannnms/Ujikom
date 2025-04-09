<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Penjualan;
use Illuminate\Http\Request;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans =  Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penggunas = Pengguna::all();
        $penjualans = Penjualan::all();
        return view('penjualan.create', compact('penjualans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate ([
            'total_harga' => 'required',
            'tanggal_penjualan' => 'required',
            'pengguna_id' => 'required',
        ]);

        Penjualan::create($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penjualans = Penjualan::findordfail($id);
        return view('penjualan.edit', compact('penjualans'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penjualans = Penjualan::findordfail($id);
        $request -> validate ([
            'total_harga' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
            'pengguna_id' => 'required|integer',
        ]);

        Penjualan::update($request->all());
        return redirect()->view('penjualan_index')->with('success', 'Data penjualan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualans)
    {
        $penjualans->delete();
        return redirect()->view('penjualan.index')->with('success', 'Data penjualan berhasil dihapus');
    }
}
