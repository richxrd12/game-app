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
                $wishlistCount = auth()->user()->wishlist()->count();
            @endphp

            <a href="/wishlist" class="relative inline-block">
                <img src="{{ asset('images/filled_heart.png') }}" alt="cart" class="size-[4vh]">

                @if ($wishlistCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        {{ $wishlistCount }}
                    </span>
                @endif
            </a>

            <a href="/cart" class="relative inline-block">
                <img src="{{ asset('images/cart.png') }}" alt="cart" class="size-[4vh]">

                @if ($cartCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            <div class="relative">
                <button id="profile" type="button" class="text-gray-700 hover:text-blue-600 transition font-medium flex items-center gap-1">
                    Perfil
                    <svg id="arrow" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="hidden" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 py-2 hidden">
                    <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">👤 Perfil</a>
                    <a href="/orders" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🧾 Mis pedidos</a>
                    <form action="/logout" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            🚪 Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>