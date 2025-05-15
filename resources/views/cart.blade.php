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
    <main class="bg-[#F9FAFB] min-h-[90vh] px-4 sm:px-8 lg:px-16 py-10 flex justify-center">
        <div class="w-full max-w-3xl min-w-[320px]">
            <h1 class="text-center font-bold text-3xl text-[#5B2AB1] mb-10">Carrito</h1>

            @if($cart->isNotEmpty())
                <div class="space-y-4">
                    @foreach($cart as $product)
                        <x-product_row :product="$product" :hidden="false"/>
                    @endforeach
                </div>

                <div class="mt-10 flex flex-col sm:flex-row justify-between items-center border-t border-gray-300 pt-6">
                    <p class="text-2xl font-bold text-[#1F2937] mb-4 sm:mb-0">Total: {{ number_format($total, 2) }} €</p>

                    <a href="/orders/address"
                    class="bg-[#5B2AB1] hover:bg-[#4A2194] text-white text-lg font-semibold px-6 py-3 rounded-xl shadow transition duration-200">
                        Realizar pedido
                    </a>
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-[#1F2937] text-lg mb-6">
                        Parece que el carrito está vacío. Explora nuestro catálogo y encuentra lo que te gusta.
                    </p>
                    <a href="/"
                    class="inline-block bg-[#5B2AB1] hover:bg-[#4A2194] text-white px-6 py-3 rounded-xl shadow transition font-medium">
                        Ver productos
                    </a>
                </div>
            @endif
        </div>
    </main>

@endsection
