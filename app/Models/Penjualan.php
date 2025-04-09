<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';
    protected $primaryKey = 'penjualan_id';
    protected $fillable = [
        'total_harga',
        'tanggal_penjualan',
        'pengguna_id',
    ];
}
