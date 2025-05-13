<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add($id)
    {
        if (auth()->check())
        {
            auth()->user()->cart()->attach($id);

            return redirect()->back();
        }
        else
        {
            return view('auth.login');
        }
    }

    public function remove($id)
    {
        auth()->user()->cart()->detach($id);

        return redirect()->back();
    }

    public function clear()
    {
        auth()->user()->cart()->detach();
    }
}
