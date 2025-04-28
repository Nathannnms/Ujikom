@extends('layouts.main')
@section('content')

<head>
    <title>Update Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="container mt-5">
    <h1>Edit Data</h1>
    <form action="{{ route('penjualan.update', $penjualan->penjualan_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga"
                value="{{ old('total_harga', $penjualan->total_harga) }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_penjualan">Tanggal Penjualan</label>
            <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan"
                value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" required>
        </div>

        <div class="form-group">
            <label for="pengguna_id">Admin</label>
            <select name="pengguna_id" id="pengguna_id" class="form-control" required>
                <option value="">-- Pilih Admin --</option>
                @foreach ($penggunas as $pengguna)
                    <option value="{{ $pengguna->pengguna_id }}"
                        {{ $pengguna->pengguna_id == $penjualan->pengguna_id ? 'selected' : '' }}>
                        {{ $pengguna->user->nama_pengguna ?? $pengguna->user->name ?? 'Tanpa Nama' }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tambahkan bagian detail penjualan --}}
        <hr>
        <h5>Detail Penjualan</h5>
        @php
            $detail = $penjualan->details->first(); // asumsinya 1 detail per penjualan
        @endphp

        <div class="form-group">
            <label for="produk_id">Produk</label>
            <select name="produk_id" id="produk_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->produk_id }}"
                        {{ $detail && $produk->produk_id == $detail->produk_id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="informasi_harga">Harga Produk</label>
            <input type="number" name="informasi_harga" class="form-control"
                value="{{ $detail->informasi_harga ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah_produk">Jumlah Produk</label>
            <input type="number" name="jumlah_produk" class="form-control"
                value="{{ $detail->jumlah_produk ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

@endsection
