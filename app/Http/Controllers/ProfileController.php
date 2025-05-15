<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update($id)
    {
        $user = User::find($id);

        //Logica del register
        

        return redirect()->back();
    }
}
