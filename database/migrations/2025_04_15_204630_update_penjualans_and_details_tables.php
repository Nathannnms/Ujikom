<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel penjualans
        Schema::table('penjualans', function (Blueprint $table) {
            $table->decimal('total_harga', 10, 2)->change();

            // Pastikan dropForeign hanya kalau sebelumnya memang ada
            $table->dropForeign(['pengguna_id']); // ini bisa tetap kalau sebelumnya memang pernah dibuat
            $table->foreign('pengguna_id')->references('pengguna_id')->on('penggunas')->onDelete('cascade');
        });

        // Tabel details (tanpa dropForeign!)
        Schema::table('details', function (Blueprint $table) {
            $table->decimal('informasi_harga', 10, 2)->change();

            // Tambahkan foreign key baru (tanpa drop terlebih dulu)
            $table->foreign('penjualan_id')->references('penjualan_id')->on('penjualans')->onDelete('cascade');
            $table->foreign('produk_id')->references('produk_id')->on('produks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('penjualans', function (Blueprint $table) {
            $table->integer('total_harga')->change();
            $table->dropForeign(['pengguna_id']);
        });

        Schema::table('details', function (Blueprint $table) {
            $table->integer('informasi_harga')->change();

            // Drop foreign key hanya kalau yakin pernah dibuat
            $table->dropForeign(['penjualan_id']);
            $table->dropForeign(['produk_id']);
        });
    }
};


