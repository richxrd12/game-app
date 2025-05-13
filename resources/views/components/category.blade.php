@props([
    'category',
    'href'
])

<a href="{{ $href }}" class="inline-block px-6 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-full shadow-md hover:bg-blue-500 hover:text-white transition-all duration-300 transform hover:scale-105">
    {{ $category->name }}
</a>