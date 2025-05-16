@extends('layouts.app')

@php
    $cart = auth()->user()->cart ?? null;
@endphp

@section('title', $product->name)

@section('main')
<main class="bg-[#F9FAFB] min-h-[90vh]">
    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-w-3xl mx-auto h-96 object-cover">

    <div class="p-6 max-w-3xl mx-auto flex flex-col gap-4">
        <h2 class="text-3xl font-bold text-[#1F2937]">{{ $product->name }}</h2>
        <p class="text-base text-[#1F2937]">{{ $product->description }}</p>

        <span class="inline-block px-3 py-1 text-sm rounded-full bg-[#EDE9FE] text-[#5B2AB1] capitalize w-fit">
            {{ $product->status->name }}
        </span>

        <div class="mt-2">
            @if($product->is_discounted)
                <p class="text-lg font-medium text-gray-500 line-through">
                    {{ number_format($product->price, 2) }}€
                </p>
                <p class="text-2xl font-bold text-[#D32F2F]">
                    {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €
                </p>
            @else
                <p class="text-2xl font-bold text-[#5B2AB1]">
                    {{ number_format($product->price, 2) }}€
                </p>
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-6 mt-4">
            @if (!$product->order)
                <!-- Si está autenticado -->
                @auth
                    @php
                        $inCart = auth()->user()->cart->contains('id', $product->id);
                        $inWishlist = auth()->user()->wishlist->contains('id', $product->id);
                    @endphp

                    @if ($inCart)
                        <form action="/cart/delete/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl shadow hover:bg-[#F9FAFB] hover:text-[#5B2AB1] transition">
                                Eliminar del carrito
                            </button>
                        </form>
                    @else
                        <form action="/cart/add/{{ $product->id }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl shadow hover:bg-[#F9FAFB] hover:text-[#5B2AB1] transition">
                                Añadir al carrito
                            </button>
                        </form>
                    @endif

                    @if($inWishlist)
                        <form action="/wishlist/delete/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl hover:bg-[#7C3DE2] transition font-semibold flex items-center gap-2">
                                Wishlist
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 text-[#F9FAFB]">
                                    <path d="M12 21.35c-.36-.32-.74-.64-1.12-.97C6.6 16.28 3 13.05 3 9.25 3 6.6 5.24 4.5 7.9 4.5c1.71 0 3.3.94 4.1 2.37.8-1.43 2.39-2.37 4.1-2.37 2.66 0 4.9 2.1 4.9 4.75 0 3.8-3.6 7.03-7.88 11.13-.38.34-.76.66-1.12.97z"/>
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="/wishlist/add/{{ $product->id }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl hover:bg-[#7C3DE2] transition font-semibold flex items-center gap-2">
                                Wishlist
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" class="w-6 h-6 text-white">
                                    <path d="M12 21.35c-.36-.32-.74-.64-1.12-.97C6.6 16.28 3 13.05 3 9.25 3 6.6 5.24 4.5 7.9 4.5c1.71 0 3.3.94 4.1 2.37.8-1.43 2.39-2.37 4.1-2.37 2.66 0 4.9 2.1 4.9 4.75 0 3.8-3.6 7.03-7.88 11.13-.38.34-.76.66-1.12.97z"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                
                <!-- Si no está autenticado -->
                @else
                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl shadow hover:bg-indigo-700 transition">
                            Añadir al carrito
                        </button>
                    </form>

                    <form action="/wishlist/add/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-[#5B2AB1] text-white px-5 py-2 rounded-xl hover:bg-[#7C3DE2] transition font-semibold flex items-center gap-2">
                            Wishlist
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" class="w-6 h-6 text-white">
                                <path d="M12 21.35c-.36-.32-.74-.64-1.12-.97C6.6 16.28 3 13.05 3 9.25 3 6.6 5.24 4.5 7.9 4.5c1.71 0 3.3.94 4.1 2.37.8-1.43 2.39-2.37 4.1-2.37 2.66 0 4.9 2.1 4.9 4.75 0 3.8-3.6 7.03-7.88 11.13-.38.34-.76.66-1.12.97z"/>
                            </svg>
                        </button>
                    </form>
                @endauth                    
            @endif
        </div>
    </div>
</main>
@endsection
