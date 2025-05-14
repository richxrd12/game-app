@props([
    'address'
])

@php
    $buying = session('buying');
    $url = $buying ? "/orders/address/{$address->id}" : "/address/{$address->id}";
@endphp

<a href="{{ $url }}" class="p-2 shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Dirección</h2>
        
    <div class="space-y-1 text-gray-700">
        <p><span class="font-medium">País:</span> {{ $address->country }}</p>
        <p><span class="font-medium">Ciudad:</span> {{ $address->city }}</p>
        <p><span class="font-medium">Código postal:</span> {{ $address->postal_code }}</p>
        <p><span class="font-medium">Calle:</span> {{ $address->street }}</p>
        <p><span class="font-medium">Número:</span> {{ $address->street_number }}</p>
        <p><span class="font-medium">Piso:</span> {{ $address->floor ?? '' }}</p>
        <p><span class="font-medium">Puerta:</span> {{ $address->door_number ?? '' }}</p>
    </div>
</a>
