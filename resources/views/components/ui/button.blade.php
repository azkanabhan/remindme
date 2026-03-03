@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $base = 'inline-flex justify-center items-center px-6 py-3 rounded-xl font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all';

    $variants = [
        'primary' => 'bg-amber-500 text-slate-900 hover:bg-amber-400 focus:ring-amber-500 shadow-lg shadow-amber-500/25',
        'secondary' => 'bg-slate-800 text-slate-100 hover:bg-slate-700 focus:ring-slate-500',
        'ghost' => 'text-slate-300 hover:text-white hover:bg-slate-800 focus:ring-slate-500',
        'danger' => 'bg-red-500 text-white hover:bg-red-400 focus:ring-red-500',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>

