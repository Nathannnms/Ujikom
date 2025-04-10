@extends('layouts.main')

@section('content')
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambah Data</h1>

        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" required>
            </div>

            <div class="form-group">
                <label for="tanggal_penjualan">Tanggal Penjualan</label>
                <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" required>
            </div>

            <div class="form-group">
                <label for="pengguna_id">Admin</label>
                <select name="pengguna_id" id="pengguna_id" class="form-control" required>
                    <option value="">-- Pilih Admin --</option>
                    @foreach ($penggunas as $pengguna)
                        <option value="{{ $pengguna->pengguna_id }}">
                            {{ $pengguna->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            
            <hr>
                <h4>Detail Produk</h4>

                <div class="form-group">
                    <label for="produk_id">Produk</label>
                <select name="produk_id" id="produk_id" class="form-control" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                    <option value="{{ $produk->produk_id }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
                </div>

        <div class="form-group">
            <label for="informasi_harga">Harga</label>
            <input type="number" name="informasi_harga" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jumlah_produk">Jumlah</label>
            <input type="number" name="jumlah_produk" class="form-control" required>
        </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>


        </form>
    </div>
</body>
@endsection
