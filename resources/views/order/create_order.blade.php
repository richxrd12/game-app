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
    <main class="bg-[#F9FAFB] min-h-[90vh] px-4 sm:px-8 lg:px-16 py-10">
        <h1 class="text-3xl font-bold text-[#5B2AB1] text-center mb-10">Resumen del pedido</h1>

        <form action="/orders" method="POST" class="max-w-3xl mx-auto space-y-10">
            @csrf
            <input type="hidden" name="address" value="{{ $address->id }}">

            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 max-w-4xl mx-auto">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-6 h-6 text-[#5B2AB1]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 0c2.761 0 5 2.239 5 5 0 2.732-2.151 4.986-4.885 4.999A5.001 5.001 0 017 16c0-2.761 2.239-5 5-5z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Dirección de envío</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-700">
                    <div>
                        <p class="font-medium text-sm mb-1">País</p>
                        <p>{{ $address->country }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Ciudad</p>
                        <p>{{ $address->city }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Código postal</p>
                        <p>{{ $address->postal_code }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Calle / Plaza / Avenida</p>
                        <p>{{ $address->street }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Nº</p>
                        <p>{{ $address->street_number }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Piso</p>
                        <p>{{ $address->floor ?: '—' }}</p>
                    </div>

                    <div>
                        <p class="font-medium text-sm mb-1">Puerta</p>
                        <p>{{ $address->door_number ?: '—' }}</p>
                    </div>
                </div>
            </div>

            <div id="products" class="space-y-4">
                @foreach($cart as $product)
                    <x-product_row :product="$product" :hidden="true"/>
                @endforeach
            </div>


            <div class="flex items-center justify-between bg-white rounded-2xl shadow p-6 border border-gray-200">
                <p class="text-xl font-semibold text-gray-700">Total: 
                    <span class="text-[#5B2AB1]">{{ number_format($total, 2) }} €</span>
                </p>
                <button type="submit" class="bg-[#5B2AB1] hover:bg-[#4A2194] text-white px-6 py-3 rounded-xl font-semibold shadow transition">
                    Hacer pedido
                </button>
            </div>
        </form>
    </main>
@endsection