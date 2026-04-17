@props([
    'text' => 'Default Title',
    'size' => 'text-2xl',
    'color' => 'text-blue-500'
])
<h1 class="{{ $size }} {{ $color }}">{{ $text }}</h1>