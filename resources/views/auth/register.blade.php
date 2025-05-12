@extends('layouts.app')

@section('title', 'Registro')

@section('imports')
    @vite(['resources/js/register.js'])
@endsection

@section('main')
    <main class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-4xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
            <form action="/register" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <!-- Info personal -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Repetir contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>
                </div>

                <!-- Dirección -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                        <input type="text" name="country" id="country" value="{{ old('country') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Código postal</label>
                        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}"required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="street" class="block text-sm font-medium text-gray-700">Calle/Plaza/Avenida</label>
                        <input type="text" name="street" id="street" value="{{ old('street') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <label for="street_number" class="block text-sm font-medium text-gray-700">Nº</label>
                            <input type="text" name="street_number" id="street_number" value="{{ old('street_number') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div>
                            <label for="floor" class="block text-sm font-medium text-gray-700">Piso</label>
                            <input type="text" name="floor" id="floor" value="{{ old('floor') }}" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div>
                            <label for="door_number" class="block text-sm font-medium text-gray-700">Puerta</label>
                            <input type="text" name="door_number" id="door_number" value="{{ old('door_number') }}" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                    </div>
                </div>

                <!-- Botón invisible para luego simular el click luego -->
                <button type="submit" id="button_submit" class="hidden">
                    Registrarse
                </button>
            </form>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded my-6 mx-auto w-max">
                    <ul class="list-disc list-inside mx-auto">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="md:col-span-2 flex justify-center mt-8">
                <button type="button" id="button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow">
                    Registrarse
                </button>
            </div>
        </div>
    </main>

@endsection
