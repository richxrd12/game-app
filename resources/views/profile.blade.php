@extends('layouts.app')

@php
    $user = auth()->user();
    $addresses = auth()->user()->addresses
@endphp

@section('title', 'Perfil')

@section('imports')
    @vite('resources/js/upload_picture.js')
@endsection

@section('main')

    <main class="bg-[#F9FAFB] min-h-[90vh] px-4 py-12 mx-auto flex flex-col gap-16">

    @if (session('success'))
        <div id="success" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transition-all duration-500 ease-in-out">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORMULARIO DE PERFIL --}}
    <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white border border-gray-200 rounded-xl p-8 w-full max-w-3xl mx-auto space-y-6">
        @csrf
        @method('PUT')

        <h1 class="text-3xl font-extrabold text-[#5B2AB1] text-left">Perfil</h1>

        <div class="flex justify-start">
            <label for="input_picture" class="relative cursor-pointer group">
                @if(isset($user->image))
                    <img src="{{ asset('storage/' . $user->image) }}"
                        alt="profile-pic"
                        id="picture"
                        class="rounded-full size-24 border border-gray-300 shadow-md group-hover:border-[#5B2AB1] transition" />
                @else
                    <img src="{{ asset('images/profile.png') }}"
                        alt="profile-pic"
                        id="picture"
                        class="rounded-full size-24 border border-gray-300 shadow-md group-hover:border-[#5B2AB1] transition" />
                @endif

                <div class="absolute inset-0 bg-black bg-opacity-40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h2l2-3h10l2 3h2a2 2 0 012 2v10a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2zm9 3a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                </div>
            </label>

            <input type="file" name="image" id="input_picture" class="hidden">
        </div>

        <p id="image_uploaded" class="text-[#5B2AB1] font-semibold hidden">¡Imagen subida!</p>

        <div>
            <label for="name" class="block text-sm font-medium text-[#1F2937]">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:border-[#5B2AB1] transition"/>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-[#1F2937]">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:border-[#5B2AB1] transition"/>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-[#1F2937]">Nueva contraseña</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:border-[#5B2AB1] transition"/>
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-[#1F2937]">Confirmar nueva contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:border-[#5B2AB1] transition"/>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 border border-red-400 rounded-lg p-4">
                <strong>Se encontraron los siguientes errores:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pt-4">
            <button type="submit"
                class="w-full bg-[#5B2AB1] text-white font-semibold py-3 px-6 rounded-xl hover:bg-[#4a2195] transition">
                Guardar cambios
            </button>
        </div>
    </form>

    {{-- DIRECCIONES ABAJO --}}
    <section class="w-full max-w-6xl mx-auto flex flex-col items-center">
        <h2 class="text-3xl font-extrabold text-[#5B2AB1] mb-6">Direcciones</h2>

        <div class="w-full flex flex-wrap justify-center gap-6">
            <a href="/address/create" class="w-72 h-64 bg-white rounded-2xl border border-gray-200 hover:shadow-md hover:border-[#5B2AB1] flex items-center justify-center text-[#5B2AB1] text-6xl font-bold shadow-sm hover:bg-[#F3F4F6] transition-all duration-200">
                <p class="mb-4">+</p>
            </a>

            @foreach ($addresses as $address)
                <x-address_card :address="$address" />
            @endforeach
        </div>
    </section>
</main>



@endsection