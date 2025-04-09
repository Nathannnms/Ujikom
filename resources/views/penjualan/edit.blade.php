@extends('layouts.main')
@section('content')

    
<head>
    <title>Update Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
        
        <div class="container mt-5">
            <h1>Edit Data</h1>
            <form action="{{ route('penjualan.update', $penjualans->penjualan_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ old('total_harga', $penjualans->total_harga) }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_penjualan">Tanggal Penjualan</label>
                    <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="{{ old('tanggal_penjualan', $penjualans->tanggal_penjualan) }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_pengguna">Admin</label>
                    <select name="nama_pengguna" id="nama_pengguna" class="form-control" value="{{ old('nama_pengguna', $penjualans->nama_pengguna) }}" required>
                        <option value="">-- Pilih Admin --</option>
                        @foreach ($penggunas as $pengguna)
                            <option value="{{ $pengguna->nama_pengguna }}">{{ $pengguna->nama_pengguna }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    

@endsection