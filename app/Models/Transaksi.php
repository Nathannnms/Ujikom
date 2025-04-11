<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksis';
    protected $primaryKey = 'transaksi_id';

    public $incrementing = true; // set ke false kalau pakai UUID atau string
    protected $keyType = 'int'; // atau 'string' kalau pakai UUID
    protected $fillable = ['jenis', 'keterangan', 'jumlah', 'tanggal'];
}
