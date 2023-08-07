@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:ring-2 focus:ring-verde focus:border-verde rounded-lg border-none bg-gris-ph placeholder-gris-texto pl-5 pr-10 py-2']) !!}>
