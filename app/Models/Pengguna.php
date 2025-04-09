<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $primaryKey = 'pengguna_id';
    protected $fillable = ['nama_pengguna', 'password'];
    public $timestamps = true;
}
