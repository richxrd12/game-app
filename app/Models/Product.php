<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\ProductStatus;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'is_discounted',
        'discount',
        'category_id',
        'order_id'
    ];

    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'product_status_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function carts()
    {
        return $this->belongsToMany(User::class, 'cart_products');
    }

    public function wishlists()
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }
}
