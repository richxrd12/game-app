@extends('layouts.app')

@php
    $orders = auth()->user()->orders;
@endphp

@section('title', 'Pedidos')

@section('main')
    <main>
        @foreach($orders as $order)
            <p>{{ $order->total }}</p>
        @endforeach
    </main>
@endsection