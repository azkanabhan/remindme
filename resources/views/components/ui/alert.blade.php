@props([
    'type' => 'info', // success, error, warning, info
    'title' => null,
])

@php
    $base = 'p-4 rounded-xl border text-sm';

    $types = [
        'success' => 'bg-emerald-500/10 border-emerald-500/30 text-emerald-400',
        'error' => 'bg-red-500/10 border-red-500/30 text-red-400',
        'warning' => 'bg-amber-500/10 border-amber-500/30 text-amber-300',
        'info' => 'bg-slate-700/40 border-slate-600/60 text-slate-200',
    ];

    $classes = $base . ' ' . ($types[$type] ?? $types['info']);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} role="alert" aria-live="polite">
    @if ($title)
        <p class="font-medium mb-1">{{ $title }}</p>
    @endif
    {{ $slot }}
</div>

