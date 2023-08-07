<div>
    <x-curriculum-title>Datos Personales</x-curriculum-title>
    {{-- Contenedor de Nombre y Apellidos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-16 mb-8">
        {{-- Nombre --}}
        <div class="w-full">
            <x-label for="name">Nombre</x-label>
            <x-text-input type="text" class="w-full" id="name" wire:model="name" :placeholder="'Ingrese el nombre o los nombres pila del estudiante'" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Apellidos --}}
        <div class="w-full">
            <x-label for="lastName">Apellidos</x-label>
            <x-text-input type="text" class="w-full" id="lastName" wire:model="lastName" :placeholder="'Ingrese el apellido o los apellidos del estudiante'" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>
    </div>

    {{-- Contenedor de Correo y Telefono  --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-16 mb-8">
        {{-- Correo --}}
        <div class="w-full">
            <x-label for="email">Correo</x-label>
            <x-text-input type="email" class="w-full" id="email" wire:model="email" :placeholder="'Ejemplo: micorreo@gmail.com'" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Telefono --}}
        <div class="w-full">
            <x-label for="phone">Teléfono</x-label>
            <x-text-input type="text" class="w-full" id="phone" wire:model="phone" :placeholder="'Ejemplo: 012 345 6789'" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
    </div>

    {{-- Contenedor de Acerca de mi --}}
    <div class="w-full">
        <x-label for="aboutMe">Acerca de mi</x-label>
        <x-text-area id="aboutMe" wire:model="aboutMe" :placeholder="'Ingrese una descripción breve del estudiante'"></x-text-area>
        <x-input-error :messages="$errors->get('aboutMe')" class="mt-2" />
    </div>

</div>