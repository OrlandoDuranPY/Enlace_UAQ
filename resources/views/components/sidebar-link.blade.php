@props(['active'])

@php
    $classes = $active ?? false ? 'w-full bg-white text-rojo font-semibold py-3 px-4 rounded-lg' : 'w-full text-white font-semibold py-3 px-4 rounded-lg group hover:bg-white hover:text-rojo transition-all';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <p class="text-lg">
        <span class="inline-block w-8 text-xl">
            {{$icon}}
        </span>
        {{$option}}
    </p>
</a>
