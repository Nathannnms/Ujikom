@extends('layouts.main')
@section('content')

<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
       
   <body>
    

        <div class="container mt-5">
            <h1>Edit Produk</h1>
            <form action="{{ route('produk.update', $produks->produk_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produks->nama_produk) }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $produks->harga) }}" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $produks->stock) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    
    </body>
@endsection