<div
    {{ $attributes->merge(['class' => 'h-auto md:h-60 box-border shadow-md rounded-lg overflow-hidden bg-gris-tarjeta relative cursor-pointer']) }}>
    {{-- Contenedor de la informacion de la tarjeta --}}
    <div class=" px-4 pb-12 md:pb-3 pt-3">
        {{ $cardInfo }}
    </div>
    {{-- Texto que aparece en el boton para ver el preview --}}
    <div class="bg-verde text-center text-white font-semibold py-1 absolute bottom-0 w-full">
        <p>{{ $button }}</p>
    </div>
</div>
