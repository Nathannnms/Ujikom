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

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id', 'pengguna_id');
    }

    public function details()
    {
    return $this->hasMany(Detail::class, 'penjualan_id', 'penjualan_id');
    }
}
