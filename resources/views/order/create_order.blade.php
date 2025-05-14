@extends('layouts.app')

@php
    $cart = auth()->user()->cart;
    $total = 0;

    foreach ($cart as $product)
    {
        $total += $product->price - (($product->price * $product->discount) / 100);
    }
@endphp

@section('title', 'Realizar pedido')

@section('main')
    <main>
        <p>Realizar pedido</p>

        <form action="/orders" method="POST">
            @csrf
            <input type="hidden" name="address" value="{{ $address->id }}">
            <div id="products">
                @foreach($cart as $product)
                    <x-product_row :product="$product" :hidden="true"/>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 max-w-[70vh] mx-auto mt-20">
            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                <input type="text" name="country" id="country" value="{{ $address->country }}" class="mt-1 block w-full p-2" required disabled/>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                <input type="text" name="city" id="city" value="{{ $address->city }}" required class="mt-1 block w-full p-2" disabled/>
            </div>

            <div>
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Código postal</label>
                <input type="text" name="postal_code" id="postal_code" value="{{ $address->postal_code }}"required class="mt-1 block w-full p-2" disabled/>
            </div>

            <div>
                <label for="street" class="block text-sm font-medium text-gray-700">Calle/Plaza/Avenida</label>
                <input type="text" name="street" id="street" value="{{ $address->street }}" required class="mt-1 block w-full rounded-lg sm p-2" disabled/>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <div>
                    <label for="street_number" class="block text-sm font-medium text-gray-700">Nº</label>
                    <input type="text" name="street_number" id="street_number" value="{{ $address->street_number }}" required class="mt-1 block w-full" disabled/>
                </div>
                <div>
                    <label for="floor" class="block text-sm font-medium text-gray-700">Piso</label>
                    <input type="text" name="floor" id="floor" value="{{ $address->floor }}" class="mt-1 block w-full" disabled/>
                </div>
                <div>
                    <label for="door_number" class="block text-sm font-medium text-gray-700">Puerta</label>
                    <input type="text" name="door_number" id="door_number" value="{{ $address->door_number }}" class="mt-1 block w-full" disabled/>
                </div>
            </div>

            <input type="text" value="{{ number_format($total, 2) }} €" disabled>

            <button class="bg-red-500 max-w-min mx-auto">Hacer pedido</button>
        </form>
    </main>
@endsection