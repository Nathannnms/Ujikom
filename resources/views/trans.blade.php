@extends('layouts.main')

@section('content')
<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="w-full px-6 py-6 mx-auto">

    <!-- Ringkasan Card -->
    <div class="flex flex-wrap -mx-3 mb-6">
        <!-- Pemasukan Card -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col bg-white shadow-soft-xl rounded-2xl p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Total Pemasukan</p>
                        <h5 class="text-xl font-bold text-lime-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pengeluaran Card -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col bg-white shadow-soft-xl rounded-2xl p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-semibold text-gray-700">Total Pengeluaran</p>
                        <h5 class="text-xl font-bold text-red-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">
            + Tambah Transaksi
        </a>
    </div>

    <!-- Tabel Riwayat -->
    <div class="bg-white shadow-soft-xl rounded-2xl p-4">
        <h4 class="text-lg font-bold mb-4">Riwayat Transaksi</h4>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->tanggal }}</td>
                            <td>
                                <span class="px-2 py-1 rounded-full text-sm text-white
                                    {{ $transaksi->jenis == 'pemasukan' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($transaksi->jenis) }}
                                </span>
                            </td>
                            <td>{{ $transaksi->keterangan }}</td>
                            <td>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('transaksi.struk', $transaksi->transaksi_id) }}" class="text-blue-600 hover:underline">
                                    Lihat Struk
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
@endsection
