@extends('layouts.main')
@section('content')
<head>
    <title>Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
<div class="container mt-5">
    <h2>Detail Penjualan #{{ $penjualan->penjualan_id }}</h2>
    <p><strong>Total Harga:</strong> {{ $penjualan->total_harga }}</p>
    <p><strong>Tanggal Penjualan:</strong> {{ $penjualan->tanggal_penjualan }}</p>

    <h4>Daftar Produk:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->details as $detail)
                <tr>
                    <td>{{ $detail->produk->nama_produk ?? 'Produk tidak ditemukan' }}</td>
                    <td>{{ $detail->informasi_harga }}</td>
                    <td>{{ $detail->jumlah_produk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
@endsection
