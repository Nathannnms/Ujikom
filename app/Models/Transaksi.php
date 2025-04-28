<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksis';
    protected $primaryKey = 'transaksi_id';

    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = ['jenis', 'keterangan', 'jumlah', 'tanggal', 'penjualan_id'];

    public function penjualan()
    {
    return $this->belongsTo(Penjualan::class, 'penjualan_id'); 
    }
}
