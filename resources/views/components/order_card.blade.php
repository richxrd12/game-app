@props([
    'order'
])

<a href="/orders/{{ $order->id }}">
    <div class="p-4 bg-white shadow rounded-xl border border-gray-200">
        <h2 class="text-lg font-semibold mb-2">Pedido #{{ $order->id }}</h2>

        <div class="text-sm text-gray-600 mb-1">
            📍 {{ $order->address->street }} {{ $order->address->street_number }},
            @if($order->address->floor)
                piso {{ $order->address->floor }},
            @endif
            @if($order->address->door_number)
                puerta {{ $order->address->door_number }},
            @endif
            {{ $order->address->city }}, {{ $order->address->country }}
        </div>

        <div class="text-sm text-gray-700 mb-1">
            🧾 Estado: <span class="font-medium">{{ ucfirst($order->status) }}</span>
        </div>

        <div class="text-sm text-gray-700 mb-1">
            💰 Total: <span class="font-semibold">{{ number_format($order->total, 2) }} €</span>
        </div>

        <div class="text-sm text-gray-500">
            🕒 Realizado el {{ $order->created_at->format('d/m/Y H:i') }}
        </div>
    </div>
</a>
