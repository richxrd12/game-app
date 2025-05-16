@extends('layouts.app')

@section('title', 'Añadir dirección')

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] flex items-center justify-center px-4">
        @if(isset($address))
            <form action="/address" method="POST" class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-2xl space-y-6 border border-gray-200">
                @csrf
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-[#5B2AB1]">Editar dirección</h1>

                <div>
                    <label for="country" class="block text-sm font-medium text-[#1F2937]">País <span class="text-red-500">*</span></label>
                    <input type="text" name="country" id="country" value="{{ $address->country }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-[#1F2937]">Ciudad <span class="text-red-500">*</span></label>
                    <input type="text" name="city" id="city" value="{{ $address->city }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-[#1F2937]">Código postal <span class="text-red-500">*</span></label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ $address->postal_code }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="street" class="block text-sm font-medium text-[#1F2937]">Calle / Plaza / Avenida <span class="text-red-500">*</span></label>
                    <input type="text" name="street" id="street" value="{{ $address->street }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="street_number" class="block text-sm font-medium text-[#1F2937]">Nº <span class="text-red-500">*</span></label>
                        <input type="text" name="street_number" id="street_number" value="{{ $address->street_number }}" required
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                    <div>
                        <label for="floor" class="block text-sm font-medium text-[#1F2937]">Piso</label>
                        <input type="text" name="floor" id="floor" value="{{ $address->floor }}"
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                    <div>
                        <label for="door_number" class="block text-sm font-medium text-[#1F2937]">Puerta</label>
                        <input type="text" name="door_number" id="door_number" value="{{ $address->door_number }}"
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                </div>

                <p class="text-end font-semibold">Requerido <span class="text-red-500">*</span></p>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-[#5B2AB1] text-white font-semibold py-3 px-6 rounded-xl hover:bg-[#4a2195] transition">
                        Guardar dirección
                    </button>
                </div>
            </form>
        @else
            <form action="/address" method="POST" class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-2xl space-y-6 border border-gray-200">
                @csrf
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-[#5B2AB1]">Añadir dirección</h1>

                <div>
                    <label for="country" class="block text-sm font-medium text-[#1F2937]">País <span class="text-red-500">*</span></label>
                    <input type="text" name="country" id="country" value="{{ old('country') }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-[#1F2937]">Ciudad <span class="text-red-500">*</span></label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-[#1F2937]">Código postal <span class="text-red-500">*</span></label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div>
                    <label for="street" class="block text-sm font-medium text-[#1F2937]">Calle / Plaza / Avenida <span class="text-red-500">*</span></label>
                    <input type="text" name="street" id="street" value="{{ old('street') }}" required
                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="street_number" class="block text-sm font-medium text-[#1F2937]">Nº <span class="text-red-500">*</span></label>
                        <input type="text" name="street_number" id="street_number" value="{{ old('street_number') }}" required
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                    <div>
                        <label for="floor" class="block text-sm font-medium text-[#1F2937]">Piso</label>
                        <input type="text" name="floor" id="floor" value="{{ old('floor') }}"
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                    <div>
                        <label for="door_number" class="block text-sm font-medium text-[#1F2937]">Puerta</label>
                        <input type="text" name="door_number" id="door_number" value="{{ old('door_number') }}"
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-3 focus:ring-[#5B2AB1] focus:outline-none focus:ring-2 transition"/>
                    </div>
                </div>

                <p class="text-end font-semibold">Requerido <span class="text-red-500">*</span></p>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-[#5B2AB1] text-white font-semibold py-3 px-6 rounded-xl hover:bg-[#4a2195] transition">
                        Guardar dirección
                    </button>
                </div>
            </form>
        @endif
    </main>
@endsection
