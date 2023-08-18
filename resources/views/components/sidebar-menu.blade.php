@props(['active', 'link'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 rounded-lg text-blue-700 text-sm semibold bg-white my-5'
            : 'flex items-center p-2 rounded-lg text-white text-sm semibold hover:bg-white hover:text-blue-700 my-5';
@endphp
<a href="{{ $link }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>