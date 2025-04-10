<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $primaryKey = 'detail_id';
    protected $fillable = ['penjualan_id', 'produk_id', 'informasi_harga', 'jumlah_produk'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }
}
