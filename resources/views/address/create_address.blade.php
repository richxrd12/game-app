@extends('layouts.app')

@section('title', 'Añadir dirección')

@section('main')
    <form action="/address" method="POST">
        @csrf
        <div class="flex flex-col gap-4 max-w-[70vh] mx-auto mt-20">
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

            <button class="bg-red-500 max-w-min mx-auto">Enviar</button>
        </div>
    </form>
@endsection