<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'product',
        'base_price',
        'sell_price',
        'quantity',
        'total_price',
    ];
}
