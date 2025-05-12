@extends('layouts.app')

@section('title', 'Inicio de sesión')

@section('nav')
    
@endsection

@section('main')
    <main class="bg-[#1a1a1a] w-screen h-screen flex items-center justify-center px-4">
        <div class="bg-white p-8 sm:p-10 lg:p-14 shadow-2xl rounded-2xl w-full max-w-[480px] lg:max-w-[600px]">
            <form method="POST" action="/login" class="flex flex-col gap-6">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-gray-800">Iniciar sesión</h1>
                @csrf

                <div>
                    <label for="email" class="block text-sm lg:text-base font-medium text-gray-700">Correo electrónico</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div>
                    <label for="password" class="block text-sm lg:text-base font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required class="mt-1 w-full border border-gray-300 rounded-lg p-3 text-base focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="flex justify-between text-sm text-gray-600 mt-1">
                    <a href="/forgot-password" class="hover:underline">¿Olvidaste tu contraseña?</a>
                    <a href="/register" class="hover:underline font-semibold text-purple-700">Crear cuenta</a>
                </div>

                <button type="submit" class="mt-4 bg-purple-700 hover:bg-purple-800 text-white font-semibold py-3 rounded-lg text-base lg:text-lg transition duration-300">
                    Iniciar sesión
                </button>
            </form>
        </div>
    </main>
@endsection