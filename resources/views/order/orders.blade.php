@extends('layouts.app')

@php
    $orders = auth()->user()->orders;
@endphp

@section('title', 'Pedidos')

@section('main')
    <main>
        @if($orders)
            @foreach($orders as $order)
                <x-order_card :order="$order"/>
            @endforeach
        @else
            <a href="/"><p class="font-bold">No tienes ningún pedido aún, pulse para ver productos</a></p>
        @endif
    </main>
@endsection