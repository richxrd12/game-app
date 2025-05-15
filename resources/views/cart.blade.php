@extends('layouts.app')

@php
    $cart = auth()->user()->cart;
    $total = 0;

    foreach ($cart as $product)
    {
        $total += $product->price - (($product->price * $product->discount) / 100);
    }
@endphp

@section('title', 'Carrito')

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh]">
        <h1 class="text-center font-bold text-3xl my-10">Carrito</h1>

        @if($cart->isNotEmpty())
            @foreach($cart as $product)
                <x-product_row :product="$product" :hidden="false"/>
            @endforeach

            <p>Total: {{ number_format($total, 2) }} €</p>
            <a href="/orders/address" class="bg-red-500">Realizar pedido</a>

        @else
            <div class="text-center py-20">
                <p class="text-gray-600 mb-6">Parece que el carrito está vacío. Explora nuestro catálogo y encuentra lo que te gusta.</p>
                <a href="/" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition font-medium">
                    Ver productos
                </a>
            </div>
        @endif
    </main>
@endsection