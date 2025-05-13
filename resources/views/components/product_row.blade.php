@props([
    'product',
    'hidden'
])

<div class="flex items-center gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-200">
    <a href="/product/{{ $product->id }}">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="size-12 object-cover rounded-xl">
    </a>

    <div class="flex-1">
        <h3 class="text-lg font-semibold text-gray-800">
            {{ $product->name }}
        </h3>
        <p class="text-xl font-bold mt-1">
            {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €
        </p>
    </div>

    @if($hidden != true)
        <form action="/cart/delete/{{ $product->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-xl transition">
                Eliminar
            </button>
        </form>
    @endif
</div>
