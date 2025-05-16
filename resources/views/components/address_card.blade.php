@props([
    'address'
])

@php
    $buying = session('buying');
    $url = $buying ? "/orders/address/{$address->id}" : "/address/{$address->id}";
@endphp

<a href="{{ $url }}"
   class="block w-72 max-h-64 overflow-y-auto bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-md hover:border-[#5B2AB1] transition-all duration-200 p-5 group">

    <h2 class="text-xl font-bold text-[#5B2AB1] mb-4">Dirección</h2>

    <ul class="space-y-1 text-sm text-[#374151]">
        <li><span class="font-semibold text-[#1F2937]">País:</span> {{ $address->country }}</li>
        <li><span class="font-semibold text-[#1F2937]">Ciudad:</span> {{ $address->city }}</li>
        <li><span class="font-semibold text-[#1F2937]">Código postal:</span> {{ $address->postal_code }}</li>
        <li><span class="font-semibold text-[#1F2937]">Calle:</span> {{ $address->street }}</li>
        <li><span class="font-semibold text-[#1F2937]">Número:</span> {{ $address->street_number }}</li>
        @if($address->floor)
            <li><span class="font-semibold text-[#1F2937]">Piso:</span> {{ $address->floor }}</li>
        @endif
        @if($address->door_number)
            <li><span class="font-semibold text-[#1F2937]">Puerta:</span> {{ $address->door_number }}</li>
        @endif
    </ul>
</a>
