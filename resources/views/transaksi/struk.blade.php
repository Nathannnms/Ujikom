@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="shadow-sm border bg-white p-4 rounded text-dark w-100" style="max-width: 350px; font-family: monospace;">
        <h5 class="text-center mb-3">🧾 <strong>Struk Transaksi</strong></h5>
        <hr>
        <p><strong>Jenis:</strong> {{ ucfirst($transaksi->jenis) }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
        <p><strong>Jumlah:</strong> Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</p>
        <hr>
        <p><strong>Keterangan:</strong></p>
        <p>{{ $transaksi->keterangan }}</p>
        @if($transaksi->penjualan)
            <hr>
            <p><strong>Detail Produk:</strong></p>
            <ul>
            @foreach($transaksi->penjualan->details as $detail)
            <li>{{ $detail->produk->nama_produk }} x{{ $detail->jumlah }} - Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</li>
             @endforeach
        </ul>
        @endif
        <hr>
        <p class="text-center">Terima kasih 🙏</p>

        <div class="text-center mt-4 no-print">
            <a href="{{ route('trans') }}" class="btn btn-sm btn-secondary">⬅ Kembali</a>
            <button onclick="window.print()" class="btn btn-sm btn-primary">🖨 Cetak</button>
        </div>
    </div>
</div>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .border, .border * {
            visibility: visible;
        }
        .border {
            position: absolute;
            left: 0;
            right: 0;
            top: 10%;
            margin: auto;
        }
        .no-print {
            display: none !important;
        }
    }
</style>
@endsection
