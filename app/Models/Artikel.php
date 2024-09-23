<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'topic', 'sampul', 'jam_buat', 'penulis', 'hari_buat', 'isi'
    ];
}