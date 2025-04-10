    @extends('layouts.main')
    @section('content')

    <head>
        <title>Penjualan</title>
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
                    <th>Tanggal Penjualan</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penjualan->total_harga }}</td>
                        <td>{{ $penjualan->tanggal_penjualan }}</td>
                        <td>{{ $penjualan->pengguna->nama_pengguna ?? '-' }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('penjualan.edit', $penjualan->penjualan_id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        
                                <a href="{{ route('penjualan.show', $penjualan->penjualan_id) }}" class="btn btn-info btn-sm mr-2">Lihat Detail</a>
                        
                                <form action="{{ route('penjualan.destroy', $penjualan->penjualan_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </body>
    @endsection