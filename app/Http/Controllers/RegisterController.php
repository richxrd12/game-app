<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Address;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'country' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'street' => 'required|string|max:50',
            'street_number' => 'required|string',
            'floor' => 'nullable|string',
            'door_number' => 'nullable|string'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Introduce un correo electrónico válido.',
            'email.unique' => 'Ese correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'country.required' => 'El país es obligatorio.',
            'city.required' => 'La ciudad es obligatoria.',
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.max' => 'El código postal no puede tener más de 10 caracteres.',
            'street.required' => 'La calle es obligatoria.',
            'street.max' => 'La calle no puede tener más de 50 caracteres.',
            'street_number.required' => 'El número de calle es obligatorio.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->addresses()->create([
            'country' => $validated['country'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'street' => $validated['street'],
            'street_number' => $validated['street_number'],
            'floor' => $validated['floor'] ?? null,
            'door_number' => $validated['door_number'] ?? null,
        ]);

        $url = session()->get('url');

        //HAY QUE PONER ESTO ANTES DE TRARLO AL REGISTRO: session()->put('url', url()->previous());
        if($url) return redirect($url);

        return view('index');
    }
}
