<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AddressController extends Controller
{
    public function index()
    {
        //RETORNAR LA VIEW DE TODAS LAS ADDRESS
        return view('order.select_address');
    }

    public function create()
    {
        dd(Route::currentRouteName());
        return view('address.create_address');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'country' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'street' => 'required|string|max:50',
            'street_number' => 'required|string',
            'floor' => 'nullable|string',
            'door_number' => 'nullable|string'
        ], [
            'country.required' => 'El país es obligatorio.',
            'city.required' => 'La ciudad es obligatoria.',
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.max' => 'El código postal no puede tener más de 10 caracteres.',
            'street.required' => 'La calle es obligatoria.',
            'street.max' => 'La calle no puede tener más de 50 caracteres.',
            'street_number.required' => 'El número de calle es obligatorio.',
        ]);

        $address = $user->addresses()->create([
            'country' => $validated['country'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'street' => $validated['street'],
            'street_number' => $validated['street_number'],
            'floor' => $validated['floor'] ?? null,
            'door_number' => $validated['door_number'] ?? null,
        ]);

        $buying = session('buying');

        if ($buying)
        {
            return view('order.select_address');
        }

        //HAY QUE CAMBIARLO POR EL INDEX DE ARRIBA CUANDO ESTÉ HECHO
        return view('index');
    }

    public function show($id)
    {
        //HAY QUE HACERLO
        return view('address');
    }
}
