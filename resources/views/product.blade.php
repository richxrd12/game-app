@extends('layouts.app')

@php
    $cart = auth()->user()->cart ?? null;
@endphp

@section('title', $product->name)

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh]">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-96 object-cover">

        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h2>
            <p class="text-lg text-gray-600">{{ $product->description }}</p>

            <span class="inline-block px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-800 capitalize mt-2">
                {{ $product->status->name }}
            </span>

            <div class="mt-4">
                @if($product->is_discounted)
                    <p class="text-lg font-medium text-gray-500 line-through">
                        {{ number_format($product->price, 2) }}€
                    </p>
                    <p class="text-xl font-bold text-red-600">
                        {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €
                    </p>
                @else
                    <p class="text-xl font-bold text-blue-600">
                        {{ number_format($product->price, 2) }}€
                    </p>
                @endif
            </div>

            @auth
                @php
                    $inCart = auth()->user()->cart->contains('id', $product->id);
                    $inWishlist = auth()->user()->wishlist->contains('id', $product->id);
                @endphp

                @if ($inCart)
                    <form action="/cart/delete/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500">Eliminar del carrito</button>
                    </form>
                @else
                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500">Añadir al carrito</button>
                    </form>
                @endif

                @if($inWishlist)
                    <form action="/wishlist/delete/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold flex items-center">Agregar a la lista de deseados <img src="{{ asset('images/filled_heart.png') }}" alt="heart" class="ml-2 size-[4vh]"></button>
                    </form>
                @else
                    <form action="/wishlist/add/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold flex items-center">Agregar a la lista de deseados<img src="{{ asset('images/lined_heart.png') }}" alt="heart" class="ml-2 size-[4vh]"></button>
                    </form>
                @endif
                
            @else
                <form action="/cart/add/{{ $product->id }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500">Añadir al carrito</button>
                </form>
            @endauth


        </div>
    </main>
@endsection