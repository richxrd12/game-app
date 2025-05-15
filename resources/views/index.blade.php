@extends('layouts.app')

@php
    $idCategory = request()->route('id');
@endphp

@section('title', 'Home')

@section('imports')
    @vite('resources/js/search_bar.js')
@endsection

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] w-full mx-auto p-10 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center">Game Bros</h1>

        <div id="categories" class="flex flex-wrap justify-center gap-4 my-10 max-w-[70vh] mx-auto">
            <x-category :category="(object) ['name' => 'Todos']" href="/" :selected="request()->is('/')"/>
            <x-category :category="(object) ['name' => 'Ofertas']" href="/discounted" :selected="request()->is('/discounted')"/>
            @foreach ($categories as $category)
                <x-category :category="$category" href="/category/{{ $category->id }}" :selected="$idCategory == $category->id" />
            @endforeach
        </div>

        <div class="flex justify-center my-10">
            <input type="text" id="search_bar" class="mt-1 max-w-[70vw] min-w-[50vw] border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-[#5B2AB1]" placeholder="🔍 Buscador...">
        </div>

        <div class="flex flex-wrap justify-center gap-6 mx-auto max-w-full" id="products">
            @foreach ($products as $product)
                <x-product_card :product="$product" />
            @endforeach
        </div>

    </main>
@endsection