@extends('layouts.main')
@section('content')

<head>
    <title>Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <label>Jenis Transaksi</label>
    <select name="jenis" class="form-control">
        <option value="pemasukan">Pemasukan</option>
        <option value="pengeluaran">Pengeluaran</option>
    </select>

    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" required>

    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control" required>

    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>

</body>
@endsection