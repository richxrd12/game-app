<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Address;

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

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
