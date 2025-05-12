<nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center">

    <a href="/" class="text-2xl font-bold text-blue-600 flex items-center gap-2">
        <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-10">
    </a>

    {{-- Mostrar botones según el estado de la sesión --}}
    <div class="flex gap-4 items-center">
        @guest
            {{-- Si el usuario no está autenticado --}}
            <a href="/login" class="text-gray-700 hover:text-blue-600 transition font-medium">
                Iniciar sesión
            </a>
            <a href="/register" class="text-gray-700 hover:text-blue-600 transition font-medium">
                Registrarse
            </a>
        @endguest

        @auth
            {{-- Si el usuario está autenticado --}}
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-blue-600 transition font-medium">
                    Cerrar sesión
                </button>
            </form>
        @endauth
    </div>
</nav>