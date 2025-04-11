    @extends('layouts.main')

    @section('content')
    <head>
        <title>Transaksi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center">Tambah Transaksi</h1>

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis Transaksi</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('trans') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </body>
    @endsection
