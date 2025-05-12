@extends('layouts.app')

@section('title', $product->name)

@section('main')
    <div class="product-detail">
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
                        {{ number_format($product->price - $product->discount, 2) }}€
                    </p>
                @else
                    <p class="text-xl font-bold text-blue-600">
                        {{ number_format($product->price, 2) }}€
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection