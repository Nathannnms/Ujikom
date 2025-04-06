<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('detail_id');
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('produk_id');
            $table->decimal('informasi_harga');
            $table->integer('jumlah_produk'); ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
