@extends('layouts.main')

@section('content')
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ensure proper spacing from navbar */
        .content-container {
            margin-top: 80px; /* Adjust based on your navbar height */
            padding-top: 20px;
        }
        
        .product-card {
            margin-bottom: 30px;
            transition: transform 0.3s ease;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .search-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .product-img-container {
            height: 180px;
            overflow: hidden;
        }
        
        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<div class="container content-container">
    <!-- Product Detail Section -->
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <div class="card product-card">
                <div class="product-img-container bg-light">
                    <img src="https://via.placeholder.com/300x200" class="product-img" alt="Lampu Neon">
                </div>
                <div class="card-body">
                    <h3>Lampu Neon</h3>
                    <p class="text-primary font-weight-bold">Rp200.000</p>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" value="1" min="1">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product List Section -->
    <div class="search-section">
        <h2 class="mb-4">Daftar Produk</h2>
        <form class="form-inline">
            <div class="form-group mr-2 mb-2">
                <input type="text" class="form-control" placeholder="Cari nama produk...">
            </div>
            <button type="submit" class="btn btn-primary mr-2 mb-2">Cari</button>
            <button type="reset" class="btn btn-secondary mb-2">Reset</button>
        </form>
    </div>

    <div class="row">
        <!-- Product 1 -->
        <div class="col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-img-container bg-light">
                    <img src="https://via.placeholder.com/300x200" class="product-img" alt="Produk 1">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kabel USB</h5>
                    <p class="card-text">Rp50.000</p>
                    <p class="text-muted">Stok: 40</p>
                </div>
            </div>
        </div>
        
        <!-- Product 2 -->
        <div class="col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-img-container bg-light">
                    <img src="https://via.placeholder.com/300x200" class="product-img" alt="Produk 2">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lampu Philip</h5>
                    <p class="card-text">Rp20.000</p>
                    <p class="text-muted">Stok: 90</p>
                </div>
            </div>
        </div>
        
        <!-- Product 3 -->
        <div class="col-md-4 mb-4">
            <div class="card product-card">
                <div class="product-img-container bg-light">
                    <img src="https://via.placeholder.com/300x200" class="product-img" alt="Produk 3">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lampu Neon</h5>
                    <p class="card-text">Rp200.000</p>
                    <p class="text-muted">Stok: 10</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection