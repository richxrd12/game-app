@props([
    'category',
    'href',
    'selected'
])

<a href="{{ $href }}" class="inline-block px-6 py-2 text-sm font-semibold {{ $selected ? 'text-[#5B2AB1] bg-[#F9FAFB]' : 'text-[#F9FAFB] bg-[#5B2AB1]'}} rounded-full shadow-md hover:bg-[#F9FAFB] hover:text-[#5B2AB1] transition-all duration-300 transform hover:scale-105">
    {{ $category->name }}
</a>