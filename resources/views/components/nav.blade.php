<nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center h-[10vh]">

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
            @php
                $cartCount = auth()->user()->cart()->count();
            @endphp
            <a href="/cart" class="relative inline-block">
                <img src="{{ asset('images/cart.png') }}" alt="cart" class="size-[4vh]">

                @if ($cartCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

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