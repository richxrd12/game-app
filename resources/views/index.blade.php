@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <main>
        <h1 class="text-3xl font-bold text-center my-10">Game Bros</h1>
        
        <div id="categories" class="flex justify-center items-center">
            <a href="/" class="inline-block px-6 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-full shadow-md hover:bg-blue-500 hover:text-white transition-all duration-300 transform hover:scale-105">
                Todos
            </a>
            <a href="/discounted" class="inline-block px-6 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-full shadow-md hover:bg-blue-500 hover:text-white transition-all duration-300 transform hover:scale-105">
                Ofertas
            </a>
            @foreach ($categories as $category)
                <x-category :category="$category"></x-category>
            @endforeach
        </div>
        

        @foreach ($products as $product)
            <x-product_card :product="$product"></x-product_card>
        @endforeach
    </main>
@endsection