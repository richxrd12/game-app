@extends('layouts.app')

@section('title', "Pedido $order->id")

@section('main')
    <main>
        <a href="/orders"></a>
        <div class="max-w-4xl mx-auto px-4 py-8">
            <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-200">

                {{-- Título --}}
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Detalles del Pedido #{{ $order->id }}</h1>

                {{-- Fecha y Estado --}}
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                    <div class="text-sm text-gray-600">
                        📅 Fecha del pedido: <span class="font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="mt-2 sm:mt-0 text-sm text-gray-600">
                        🧾 Estado: <span class="font-semibold capitalize text-indigo-600">{{ $order->status }}</span>
                    </div>
                </div>

                <hr class="my-4">

                {{-- Dirección --}}
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Dirección de entrega</h2>
                <div class="text-gray-700 mb-4">
                    {{ $order->address->street }} {{ $order->address->street_number }}
                    @if($order->address->floor)
                        , piso {{ $order->address->floor }}
                    @endif
                    @if($order->address->door_number)
                        , puerta {{ $order->address->door_number }}
                    @endif
                    <br>
                    {{ $order->address->city }}, {{ $order->address->country }}
                </div>

                <hr class="my-4">

                {{-- Total --}}
                <div class="flex justify-between items-center text-lg">
                    <span class="font-semibold text-gray-800">Total del pedido:</span>
                    <span class="font-bold text-green-600">{{ number_format($order->total, 2) }} €</span>
                </div>

            </div>
        </div>
    </main>
@endsection