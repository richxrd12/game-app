@extends('layouts.app')

@php
    $orders = auth()->user()->orders;
@endphp

@section('title', 'Pedidos')

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] p-10">
        <h1 class="text-3xl font-bold text-center text-[#5B2AB1] mb-8">Historial de pedidos</h1>
        @if($orders->isNotEmpty())
            <div class="max-w-[70vw] mx-auto flex flex-col space-y-4">
                @foreach($orders as $order)
                    <x-order_card :order="$order"/>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-600 mb-6">Parece que aún no tienes ningún pedido. Explora nuestro catálogo y encuentra lo que te gusta.</p>
                <a href="/" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition font-medium">
                    Ver productos
                </a>
            </div>
        @endif
    </main>
@endsection