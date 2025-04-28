<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $primaryKey = 'detail_id';
    protected $fillable = ['penjualan_id', 'produk_id', 'harga_produk', 'jumlah_produk'];

    // Relasi ke model Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }
}

