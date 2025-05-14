<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist');
    }

    public function store($id)
    {
        if (auth()->check())
        {
            auth()->user()->wishlist()->attach($id);

            return redirect()->back();
        }
        else
        {
            return view('auth.login');
        }
    }

    public function remove($id)
    {
        auth()->user()->wishlist()->detach($id);

        return redirect()->back();
    }
}
