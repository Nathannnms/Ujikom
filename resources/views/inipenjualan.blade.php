@extends('layouts.main')
@section('content')

<head>
    <title>Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    

    <div class="container mt-5">
    <h1>Produk</h1>
    <a href="{{ route('penjualan.create' )}}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Total Harga</th>
                <th></th>
                <th>Stok</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->stock }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->produk_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->produk_id)}}" method="POST" style="display-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</body>
@endsection