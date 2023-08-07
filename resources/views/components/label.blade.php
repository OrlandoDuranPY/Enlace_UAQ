@props(['for'])
<label for="{{ $for ?? '' }}" {{ $attributes->merge(['class' => 'block mb-1 text-xl font-semibold']) }}>
    {{ $slot }}
</label>
