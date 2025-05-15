@extends('layouts.app')

@section('title', 'Registro')

@section('imports')
    @vite(['resources/js/register.js'])
@endsection

@section('main')
    <main class="bg-[#F9FAFB] min-h-[90vh] flex items-center justify-center px-4">
        <div class="p-8 sm:p-10 lg:p-14 shadow-2xl rounded-2xl w-full max-w-[480px] lg:max-w-[600px]">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-[#5B2AB1]">Registro</h1>
            <form action="/register" method="POST" class="flex flex-col gap-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm lg:text-base font-medium text-[#1F2937]">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-[#5B2AB1]"/>
                </div>

                <div>
                    <label for="email" class="block text-sm lg:text-base font-medium text-[#1F2937]">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-[#5B2AB1]"/>
                </div>

                <div>
                    <label for="password" class="block text-sm lg:text-base font-medium text-[#1F2937]">Contraseña</label>
                    <input type="password" name="password" id="password" required class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-[#5B2AB1]"/>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm lg:text-base font-medium text-[#1F2937]">Repetir contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-[#5B2AB1]"/>
                </div>

                <div class="flex justify-end text-sm mb-8">
                    <a href="/login" class="hover:underline font-semibold text-[#5B2AB1]">¿Ya tienes cuenta? Inicia sesión</a>
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

            <button type="button" id="button" class="w-full bg-[#5B2AB1] hover:bg-[#F9FAFB] text-white hover:text-[#5B2AB1] font-semibold py-3 rounded-lg text-base lg:text-lg transition duration-300">
                Registrarse
            </button>
            
        </div>
    </main>

@endsection
