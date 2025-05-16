<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        session(['buying' => false]);

        return view('profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        //Logica del register
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Introduce un correo electrónico válido.',
            'email.unique' => 'Ese correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'image.image' => 'El archivo subido no es una imagen.'
        ]);

        if ($request->hasFile('image')) 
        {
            if (isset($user->image)) 
            {
                Storage::delete($user->image);
            }
            
            $path = $request->file('image')->store('profile', 'public');
            $user->image = $path;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) 
        {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente.');
    }
}
