@extends('layouts.app')

@section('title', "Pedido #$order->id")

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh]">
        <a href="/orders" class="inline-block m-4 px-4 py-2 rounded-xl bg-[#5B2AB1] text-white font-semibold hover:bg-[#F9FAFB] hover:text-[#5B2AB1] transition-colors duration-200">
            Volver a pedidos
        </a>

        <div class="max-w-4xl mx-auto px-4 py-8">
            <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-200">

                <h1 class="text-2xl font-bold text-gray-800 mb-4">Detalles del Pedido #{{ $order->id }}</h1>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                    <div class="text-sm text-gray-600">
                        📅 Fecha del pedido: <span class="font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="mt-2 sm:mt-0 text-sm text-gray-600">
                        🧾 Estado: <span class="font-semibold capitalize text-indigo-600">{{ $order->status }}</span>
                    </div>
                </div>

                <hr class="my-4">

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

                <div class="my-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-6">Productos</h2>
                    @foreach($order->products as $product)
                        <div class="flex justify-between my-4">
                            <a class="flex gap-2" href="/product/{{ $product->id }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}-image" class="size-8 object-cover">
                                <p class="font-semibold text-[#5B2AB1]">{{ $product->name }}</p>
                            </a>
                            @if ($product->is_discounted)
                                <p class="font-semibold"><span class="mr-10">x1</span>{{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €</p>
                            @else
                                <p class="font-semibold"><span class="mr-10">x1</span>{{ number_format($product->price, 2) }} €</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <hr class="my-4">

                <div class="flex justify-between items-center text-lg">
                    <span class="font-semibold text-gray-800">Total del pedido:</span>
                    <span class="font-bold text-green-600">{{ number_format($order->total, 2) }} €</span>
                </div>

            </div>
        </div>
    </main>
@endsection