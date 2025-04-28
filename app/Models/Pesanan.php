<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'total_harga',
        'status', // opsional, kalau mau tracking status pesanan
    ];

    // Relasi ke user (pelanggan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
