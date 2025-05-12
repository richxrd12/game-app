<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
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
        $products = Product::where('category_id', $id)->get();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
    }

    public function discounted()
    {
        $products = Product::where('is_discounted', true)->get();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
    }
}
