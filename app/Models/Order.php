<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
