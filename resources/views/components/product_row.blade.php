@props([
    'product',
    'hidden'
])

<div class="flex items-center gap-5 p-4 bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
    <a href="/product/{{ $product->id }}">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="size-14 object-cover rounded-xl ring-2 ring-[#EDE9FE]">
    </a>
    
    <div class="flex-1 min-w-0">
        <a href="/product/{{ $product->id }}">
            <h3 class="text-lg font-semibold text-[#5B2AB1] truncate">
                {{ $product->name }}
            </h3>
        </a>
    </div>

    <div class="flex items-center justify-center">
        @if($product->is_discounted)
            <div class="text-center">
                <p class="text-sm text-gray-500 line-through">
                    {{ number_format($product->price, 2) }} €
                </p>
                <p class="text-xl font-semibold text-red-500">
                    {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €
                </p>
            </div>
        @else
            <p class="text-xl font-semibold text-[#1F2937] whitespace-nowrap">
                {{ number_format($product->price, 2) }} €
            </p>
        @endif
    </div>

    @unless($hidden)
        <form action="/cart/delete/{{ $product->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-[#5B2AB1] hover:bg-[#F9FAFB] text-white hover:text-[#5B2AB1] font-semibold px-4 py-2 rounded-xl transition duration-200 shadow-sm whitespace-nowrap">
                Eliminar
            </button>
        </form>
    @endunless
</div>

