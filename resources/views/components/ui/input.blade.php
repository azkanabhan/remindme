@props([
    'id',
    'label' => null,
    'type' => 'text',
    'error' => null,
    'autocomplete' => null,
    'placeholder' => null,
])

<div {{ $attributes->only('class')->merge(['class' => 'space-y-1']) }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-slate-300 mb-1">
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $id }}"
        name="{{ $attributes->get('name', $id) }}"
        type="{{ $type }}"
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        {{ $attributes->except(['class', 'name']) }}
        @class([
            'block w-full px-4 py-3 rounded-xl bg-slate-900/70 border text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500/50 transition-colors sm:text-sm',
            'border-slate-600' => ! $error,
            'border-red-500/50' => $error,
        ])
    >

    @if ($error)
        <p class="mt-1 text-sm text-red-400" role="alert">{{ $error }}</p>
    @endif
</div>

