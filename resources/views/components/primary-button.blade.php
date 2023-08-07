<button
    {{ $attributes->merge(['type' => 'submit', 
    'class' => 'bg-rojo focus:ring-2 focus:ring-offset-2 focus:ring-rojo text-white font-semibold rounded-lg uppercase px-5 py-2']) }}>
    {{ $slot }}
</button>
