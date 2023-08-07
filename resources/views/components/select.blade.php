<div class="relative">
    <select {{ $attributes->merge(['class' => 'w-full focus:ring-2 focus:ring-verde focus:border-verde bg-gris-ph text-gris-texto block border-none appearance-none py-2 px-5 rounded-lg'])}}>
       {{$slot}}
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center rounded-r-lg px-2 pointer-events-none bg-verde">
        <i class="fa-solid fa-caret-down text-verde-oscuro"></i>
    </div>
</div>