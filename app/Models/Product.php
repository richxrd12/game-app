<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'images',
        'name',
        'description',
        'price',
        'is_discounted',
        'discount',
        'category_id'
    ];
}
