@props([
    'product'
])

<a href="/product/{{ $product->id }}">
    <div class="bg-white rounded-2xl shadow-md overflow-hidden transition-transform hover:scale-105 w-72">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-44 object-cover">
        
        <div class="p-4 flex flex-col gap-2">
            <h3 class="text-lg font-semibold text-gray-800 truncate">
                {{ $product->name }}
            </h3>

            <span class="inline-block px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-800 capitalize w-fit">
                {{ $product->status->name }}
            </span>

            @if(!$product->is_discounted)
                <p class="text-xl font-bold text-blue-600">
                    {{ number_format($product->price, 2) }}€
                </p>
            @elseif($product->is_discounted)
                <div class="flex items-center gap-2">

                    <p class="text-lg font-medium text-gray-500 line-through">
                        {{ number_format($product->price, 2) }}€
                    </p>

                    <p class="text-xl font-bold text-red-600">
                        {{ number_format($product->price - $product->discount, 2) }}€
                    </p>
                </div>
            @endif
        </div>
    </div>
</a>