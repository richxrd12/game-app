@extends('layouts.app')

@php
    $addresses = auth()->user()->addresses;
@endphp

@section('title', 'Seleccionar dirección')

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] px-4 sm:px-8 lg:px-16 py-10">
        <h1 class="text-3xl font-extrabold text-[#5B2AB1] text-center mb-10">Selecciona una dirección</h1>

        <div class="flex flex-wrap justify-center gap-6 mx-auto max-w-6xl">
            <a href="/address/create" class="w-72 h-64 bg-white rounded-2xl border border-gray-200 hover:shadow-md hover:border-[#5B2AB1] flex items-center justify-center text-[#5B2AB1] text-6xl font-bold shadow-sm hover:bg-[#F3F4F6] transition-all duration-200">
                <p class="mb-4">+</p>
            </a>

            @foreach ($addresses as $address)
                <x-address_card :address="$address" />
            @endforeach
        </div>
    </main>
@endsection
