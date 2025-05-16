@extends('layouts.app')

@php
    $wishlist = auth()->user()->wishlist;
@endphp

@section('title', 'Lista de deseados')

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] p-10">
        <h1 class="text-center font-bold text-3xl text-[#5B2AB1] mb-8">Lista de deseados</h1>

        @if ($wishlist->isNotEmpty())
            <div class="flex flex-wrap justify-center gap-6 mx-auto max-w-full">
                @foreach ($wishlist as $product)
                    <x-product_card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-[#1F2937] text-lg mb-6">
                    Parece que la lista de deseados está vacía. Explora nuestro catálogo y encuentra lo que te gusta.
                </p>
                <a href="/" class="inline-block bg-[#5B2AB1] hover:bg-[#4A2194] text-white px-6 py-3 rounded-xl shadow transition font-medium">
                    Ver productos
                </a>
            </div>
        @endif
    </main>
@endsection