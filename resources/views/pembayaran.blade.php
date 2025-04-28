@extends('layouts.main')

@section('content')
<head>
    <title>Halaman Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .product-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        .summary-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Pembayaran</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Informasi Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pembayaran.store') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" required>
                            </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card summary-card">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Ringkasan Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <h5>Produk Dipilih:</h5>
                        <ul class="list-unstyled">
                            @foreach($cart as $item)
                                <li class="product-item">
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $item['name'] }}</span>
                                        <span>Rp{{ number_format($item['harga'], 0, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-muted">
                                        <small>Jumlah: {{ $item['jumlah'] }}</small>
                                        <small>Total: Rp{{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</small>
                                    </div>
                                    <input type="hidden" name="produk[{{ $item['id'] }}][id]" value="{{ $item['id'] }}">
                                    <input type="hidden" name="produk[{{ $item['id'] }}][jumlah]" value="{{ $item['jumlah'] }}">
                                </li>
                            @endforeach
                        </ul>
                        
                        <hr>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Total Harga</label>
                            <input type="text" class="form-control font-weight-bold text-danger" value="Rp {{ number_format($total_harga, 0, ',', '.') }}" readonly>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-block btn-lg mt-3">
                            <i class="fas fa-credit-card mr-2"></i> Proses Pembayaran
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection