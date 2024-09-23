<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $fillable = [
        'nama_toko',
        'no_hp_toko',
        'name',
        'kategori',
        'alamat_toko',
        'status', 
    ];
}