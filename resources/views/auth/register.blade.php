@extends('layouts.app')

@section('title', 'Registro')

@section('main')
    <main class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-4xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
            <form action="/register" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Columna izquierda: info personal -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="repeat_password" class="block text-sm font-medium text-gray-700">Repetir contraseña</label>
                        <input type="password" name="repeat_password" id="repeat_password" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>
                </div>

                <!-- Columna derecha: dirección -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                        <input type="text" name="country" id="country" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text" name="city" id="city" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Código postal</label>
                        <input type="text" name="postal_code" id="postal_code" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div>
                        <label for="street" class="block text-sm font-medium text-gray-700">Calle/Plaza/Avenida</label>
                        <input type="text" name="street" id="street" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700">Nº</label>
                            <input type="text" name="number" id="number" required class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div>
                            <label for="floor" class="block text-sm font-medium text-gray-700">Piso</label>
                            <input type="text" name="floor" id="floor" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div>
                            <label for="door" class="block text-sm font-medium text-gray-700">Puerta</label>
                            <input type="text" name="door" id="door" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                    </div>
                </div>

                <!-- Botón de enviar -->
                <div class="md:col-span-2 flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </main>

@endsection
