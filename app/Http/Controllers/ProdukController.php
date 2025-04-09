<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks =  Produk::all();
        return view('iniproduk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($User)
    {
        $users = User::all();
        $produks = Produk::all();
        return view('produk.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        Produk::create($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        $produks = Produk::findorfail($id);
        return view('produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produks = Produk::findOrFail($id);;
        $request -> validate ([
            'nama_produk' => 'required',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $produks -> update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produks)
    {
        $produks->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
