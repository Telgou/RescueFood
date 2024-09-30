<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'image',
        'expired_date',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
