@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center my-10">Game Bros</h1>

        <!-- Categorías con Grid Responsive -->
        <div id="categories" class="flex flex-wrap justify-center gap-4 mb-10">
            <x-category :category="(object) ['name' => 'Todos']" href="/" />
            <x-category :category="(object) ['name' => 'Ofertas']" href="/discounted" />
            @foreach ($categories as $category)
                <x-category :category="$category" href="/category/{{ $category->id }}"/>
            @endforeach
        </div>

        <!-- Productos -->
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <x-product_card :product="$product" />
            @endforeach
        </div>
    </main>
@endsection