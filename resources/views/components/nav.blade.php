<nav class="bg-[#5b2ab1] shadow-md py-4 px-8 flex justify-between items-center h-[10vh]">

    <a href="/" class="text-2xl font-bold text-blue-600 flex items-center gap-2">
        <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="size-[6vh] rounded-full transition-transform duration-300 transform hover:scale-110">
    </a>

    <div class="flex gap-4 items-center">
        @guest
            <div class="flex gap-4">
                <a href="/login"
                class="bg-white text-[#1F2937] border border-[#5B2AB1] hover:bg-[#5B2AB1] hover:text-white font-medium py-2 px-4 rounded-xl transition-colors duration-300">
                    Iniciar sesión
                </a>
                <a href="/register"
                class="bg-[#5B2AB1] text-white hover:bg-[#45208d] font-medium py-2 px-4 rounded-xl transition-colors duration-300">
                    Registrarse
                </a>
            </div>
        @endguest

        @auth
            @php
                $cartCount = auth()->user()->cart()->count();
                $wishlistCount = auth()->user()->wishlist()->count();
            @endphp

            <a href="/wishlist" class="relative inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#F9FAFB] duration-300 hover:text-[#7C3DE2] size-[4vh]" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 text-red-600">
                    <path d="M12 21.35c-.36-.32-.74-.64-1.12-.97C6.6 16.28 3 13.05 3 9.25 3 6.6 5.24 4.5 7.9 4.5c1.71 0 3.3.94 4.1 2.37.8-1.43 2.39-2.37 4.1-2.37 2.66 0 4.9 2.1 4.9 4.75 0 3.8-3.6 7.03-7.88 11.13-.38.34-.76.66-1.12.97z"/>
                </svg>


                @if ($wishlistCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        {{ $wishlistCount }}
                    </span>
                @endif
            </a>

            <a href="/cart" class="relative inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#F9FAFB] duration-300 hover:text-[#7C3DE2] size-[4vh]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.08.835L5.82 6.75M6 6.75h14.25l-1.5 6H6.75m0 0l-.75 3h12.75m-12.75 0H4.125a.375.375 0 01-.375-.375V17.25m3 3.75a.75.75 0 100-1.5.75.75 0 000 1.5zm12 0a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                </svg>

                @if ($cartCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            <div class="relative">
                <button id="profile" type="button" class="text-[#F9FAFB] hover:text-[#7C3DE2] transition font-medium flex items-center gap-1">
                    {{ auth()->user()->name }}
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