@extends('layouts.app')

@php
    $addresses = auth()->user()->addresses;
@endphp

@section('title', 'Seleccionar dirección')

@section('main')
<main class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4 items-stretch">

    <a href="/address/create">
        <div class="card-box flex items-center justify-center text-gray-600 hover:bg-gray-50 transition">
            <p class="text-4xl font-bold">+</p>
        </div>
    </a>

    @foreach ($addresses as $address)
        <x-address_card :address="$address" />
    @endforeach

</main>
@endsection
