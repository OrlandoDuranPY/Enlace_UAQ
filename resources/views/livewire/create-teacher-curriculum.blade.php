<x-container>
    <form class="space-y-10 lg:space-y-20 pb-10" wire:submit.prevent='createCurriculum' novalidate>
        {{-- Datos personales --}}
        <div>
            <x-secondary-title>Datos personales</x-secondary-title>
            {{-- Nombre y Apellidos --}}
            <x-grid-container>
                {{-- Nombre --}}
                <div class="w-full">
                    <x-label for="name">Nombre</x-label>
                    <x-text-input wire:model="name" type="text" class="w-full" id="name" :placeholder="'Ingrese el nombre o los nombres de pila del estudiante'" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Apellidos --}}
                <div class="w-full">
                    <x-label for="last_name">Apellidos</x-label>
                    <x-text-input wire:model="last_name" type="text" class="w-full" id="last_name" :placeholder="'Ingrese el apellido o los apellidos del estudiante'" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>
            </x-grid-container>

            {{-- Correo y Telefono --}}
            <x-grid-container>
                {{-- Correo --}}
                <div class="w-full">
                    <x-label for="email">Correo</x-label>
                    <x-text-input wire:model="email" type="email" class="w-full" id="email" :placeholder="'Ejemplo: Mi correo@gmail.com'" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Telefono --}}
                <div class="w-full">
                    <x-label for="phone">Teléfono</x-label>
                    <x-text-input wire:model="phone" type="tel" class="w-full" id="phone" :placeholder="'Ejemplo: 012 345 6789'" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
            </x-grid-container>

            {{-- Acerca de mi --}}
            <div class="w-full">
                <x-label for="about_me">Acerca de mi</x-label>
                <x-text-area wire:model="about_me" class="w-full" id="about_me" :placeholder="'Ingrese una breve descripción del estudiante'" wire:ignore />
                <p class="text-right text-sm text-gray-300 font-semibold"><span id="about_me_counter" wire:ignore></span></p>                
                <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
            </div>
        </div>


        <x-primary-button class="block mx-auto">Finalizar registro</x-primary-button>
    </form>

    <script>
        /* ========================================
        Contador de caracteres para textArea
        ========================================= */
        document.addEventListener('livewire:load', function () {
            var aboutMeInput = document.getElementById('about_me');
            var aboutMeCounter = document.getElementById('about_me_counter');
    
            updateCounter();
    
            aboutMeInput.addEventListener('input', function () {
                updateCounter();
            });
    
            function updateCounter() {
                var length = aboutMeInput.value.length;
                aboutMeCounter.textContent = length + "/500";
                aboutMeCounter.classList.toggle('text-red-500', length > 500);
            }
        });
    </script>
    
    

</x-container>
