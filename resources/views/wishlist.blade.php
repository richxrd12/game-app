@extends('layouts.app')

@php
    $wishlist = auth()->user()->wishlist;
@endphp

@section('title', 'Lista de deseados')

@section('main')
    <main>
        <h1 class="text-center font-bold text-3xl my-10">Lista de deseados</h1>

        @if ($wishlist->isNotEmpty())
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-4">
                @foreach ($wishlist as $product)
                    <x-product_card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-600 mb-6">Parece que aún no has añadido productos a tu lista de deseos. Explora nuestro catálogo y encuentra lo que te gusta.</p>
                <a href="/" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition font-medium">
                    Ver productos
                </a>
            </div>
        @endif
    </main>
@endsection