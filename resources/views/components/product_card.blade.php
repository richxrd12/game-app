@props([
    'product'
])

<a href="/product/{{ $product->id }}" class="transition-all duration-300 ease-in-out transform">
    <div class="bg-[#F9FAFB] rounded-2xl shadow-md overflow-hidden transition-transform hover:scale-105 w-72 p-2">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-44 object-cover">
        
        <div class="p-4 flex flex-col gap-2">
            <h3 class="text-lg font-semibold text-[#5B2AB1] truncate">
                {{ $product->name }}
            </h3>

            <span class="inline-block px-3 py-1 text-sm rounded-full bg-[#EDE9FE] text-[#5B2AB1] capitalize w-fit">
                {{ $product->status->name }}
            </span>

            @if(!$product->is_discounted)
                <p class="text-xl font-semibold text-[#1F2937]">
                    {{ number_format($product->price, 2) }}€
                </p>
            @elseif($product->is_discounted)
                <div class="flex items-center gap-2">

                    <p class="text-lg font-medium text-gray-500 line-through">
                        {{ number_format($product->price, 2) }}€
                    </p>

                    <p class="text-xl font-semibold text-[#D32F2F]">
                        {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} €
                    </p>
                </div>
            @endif
        </div>
    </div>
</a>
