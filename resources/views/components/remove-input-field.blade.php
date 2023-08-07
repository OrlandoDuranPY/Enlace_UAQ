<div class="relative">
    {{ $slot }}
    <div
        {{ $attributes->merge([
            'class' => 'absolute inset-y-0 right-2 flex items-center cursor-pointer',
            // 'wire:click.prevent' => $wireClick,
        ]) }}>
        <img src="{{ asset('img/remove.svg') }}" alt="Imagen Icon">
    </div>
</div>
