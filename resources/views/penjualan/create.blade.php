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
                    <label for="nama_pengguna">Admin</label>
                    <select name="nama_pengguna" id="nama_pengguna" class="form-control" required>
                        <option value="">-- Pilih Admin --</option>
                        @foreach ($penggunas as $pengguna)
                            <option value="{{ $pengguna->nama_pengguna }}">{{ $pengguna->nama_pengguna }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </div>
            </form>
        </div>
    </body>

@endsection