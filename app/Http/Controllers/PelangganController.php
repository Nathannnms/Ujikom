<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    // Menampilkan halaman pembayaran
    public function index(Request $request)
    {
        // Ambil data dari keranjang
        $cart = session('cart', []);
        $total_harga = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['harga'] * $item['jumlah']);
        }, 0);

        return view('pembayaran', compact('cart', 'total_harga'));
    }

    // Menyimpan data pembayaran dan mengurangi stok produk
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        // Ambil keranjang belanja dari session
        $cart = session('cart', []);
    
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong.');
        }

        $total_harga = 0;

        // Menghitung total harga
        foreach ($cart as $item) {
            $total_harga += $item['harga'] * $item['jumlah'];
        }

        // Simpan data pembayaran
        $pembayaran = Pembayaran::create([
            'user_id' => Auth::id(), // ID pengguna yang login
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal' => now(),
            'jumlah' => $total_harga,
        ]);

        // Update stok produk dan simpan detail transaksi
        foreach ($cart as $item) {
            $produk = Produk::find($item['id']);
            if ($produk) {
                // Kurangi stok produk
                $produk->decrement('stock', $item['jumlah']);
            }
        }

        // Catat pemasukan di transaksi (opsional)
        Transaksi::create([
            'tanggal' => now(),
            'jenis' => 'pemasukan',
            'jumlah' => $total_harga,
            'keterangan' => 'Pembayaran dari ' . $request->nama_pelanggan,
        ]);

        // Kosongkan keranjang
        session()->forget('cart');

        // Redirect ke halaman struk
        return redirect()->route('transaksi.struk', $pembayaran->id)->with('success', 'Pembayaran berhasil!');
    }

    // Fungsi untuk pemesanan
    public function pesan(Request $request)
    {
        $user = Auth::user();

        // Validasi produk yang dipilih
        $request->validate([
            'produk' => 'required|array',
            'produk.*.jumlah' => 'required|numeric|min:1',
        ]);

        // Simpan penjualan baru
        $penjualan = Penjualan::create([
            'user_id' => $user->id,
            'total_harga' => 0, // Kita akan update total harga setelah perhitungan
        ]);

        $totalHarga = 0;

        // Proses setiap produk yang dipilih
        foreach ($request->produk as $produkId => $data) {
            $produk = Produk::findOrFail($produkId);
            $jumlah = $data['jumlah'];

            if ($produk->stock < $jumlah) {
                return redirect()->back()->withErrors(['produk' => "Stok produk {$produk->nama_produk} tidak cukup."]);
            }

            // Kurangi stok produk
            $produk->stock -= $jumlah;
            $produk->save();

            // Tambahkan detail penjualan
            $penjualan->details()->create([
                'produk_id' => $produk->produk_id,
                'jumlah_produk' => $jumlah,
                'harga' => $produk->harga,
                'subtotal' => $produk->harga * $jumlah,
            ]);

            $totalHarga += $produk->harga * $jumlah;
        }

        // Update total harga penjualan
        $penjualan->update(['total_harga' => $totalHarga]);

        // Redirect ke halaman struk atau konfirmasi
        return redirect()->route('transaksi.struk', $penjualan->penjualan_id)
                         ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function someMethod($id)
{
    $produk = Produk::find($id); // atau Produk::all(), dst
    return view('nama_view', compact('produk'));
}

}


