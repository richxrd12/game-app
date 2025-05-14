<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::whereNull('order_id')->get();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }

    public function filter($id)
    {
        $products = Product::whereNull('order_id')->where('category_id', $id)->get();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
    }

    public function discounted()
    {
        $products = Product::whereNull('order_id')->where('is_discounted', true)->get();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
    }
}
