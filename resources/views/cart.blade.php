@extends('layouts.app')

@php
    $cart = auth()->user()->cart;
    $total = 0;

    foreach ($cart as $product)
    {
        $total += $product->price - (($product->price * $product->discount) / 100);
    }
@endphp

@section('title', 'cart')

@section('main')
    <h1 class="text-center font-bold text-3xl my-10">Carrito</h1>

    @if($cart->isNotEmpty())
        @foreach($cart as $product)
            <x-product_row :product="$product" />
        @endforeach

        <p>Total: {{ number_format($total, 2) }} €</p>
        <a href="/order" class="bg-red-500">Realizar pedido</a>

    @else
        <a href="/"><p class="font-bold">No hay nada en el carrito, pulse para ver productos</a></p>
    @endif
@endsection