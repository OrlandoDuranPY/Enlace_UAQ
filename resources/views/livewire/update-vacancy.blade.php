<x-container>
    <form class="space-y-10 lg:space-y-20 pb-10" wire:submit.prevent='updateVacancy' novalidate>
        {{-- Datos de la empresa --}}
        <div>
            <x-secondary-title>Datos de la empresa</x-secondary-title>
            {{-- Nombre de la empresa y Ubicacion --}}
            <x-grid-container>
                {{-- Empresa --}}
                <div class="w-full">
                    <x-label for="company">Empresa</x-label>
                    <x-text-input wire:model="company" type="text" class="w-full" id="company" :placeholder="'Ingrese el nombre de la empresa'" />
                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                </div>

                {{-- Ubicacion --}}
                <div class="w-full">
                    <x-label for="location">Ubicación de la empresa</x-label>
                    <x-text-input wire:model="location" type="text" class="w-full" id="location"
                        :placeholder="'Ingrese el nombre o los nombres de pila del estudiante'" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>
            </x-grid-container>

        </div>

        {{-- Datos de la vacante --}}
        <div>
            <x-secondary-title>Datos de la vacante</x-secondary-title>

            <x-grid-container>
                {{-- Titulo del puesto --}}
                <div class="w-full">
                    <x-label for="job_title">Nombre del puesto</x-label>
                    <x-text-input wire:model="job_title" type="text" class="w-full" id="job_title"
                        :placeholder="'Ingrese el puesto de la vacante'" />
                    <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
                </div>

                {{-- Salario --}}
                <div class="w-full">
                    <x-label for="salary">Salario</x-label>
                    <x-text-input wire:model="salary" type="text" class="w-full" id="salary"
                        :placeholder="'Ejemplo: $5,000 - $10,000'" />
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                </div>
            </x-grid-container>

            {{-- Descripcion --}}
            <div class="w-full">
                <x-label for="description">Descripción del puesto</x-label>
                <x-text-area wire:model="description" class="w-full" id="description" :placeholder="'Ingrese una breve descripción del puesto solicitado'" wire:ignore />
                <p class="text-right text-sm text-gray-300 font-semibold"><span id="description_counter"
                        wire:ignore></span></p>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>


            {{-- Observaciones --}}
            <div class="w-full">
                <x-label for="observations">Observaciones</x-label>
                <x-text-area wire:model="observations" class="w-full" id="observations" :placeholder="'Escriba puntos que quiera resaltar de la vacante'" wire:ignore />
                <p class="text-right text-sm text-gray-300 font-semibold"><span id="observations_counter"
                        wire:ignore></span></p>
                <x-input-error :messages="$errors->get('observations')" class="mt-2" />
            </div>

        </div>

        <x-primary-button class="block mx-auto">Actualizar registro</x-primary-button>
    </form>

    <script>
        /* ========================================
                                        Contador de caracteres para textArea
                                        ========================================= */
        document.addEventListener('livewire:load', function() {
            let aboutMeInput = document.getElementById('description');
            let aboutMeCounter = document.getElementById('description_counter');
            let observationsInput = document.getElementById('observations');
            let observationsCounter = document.getElementById('observations_counter');

            updateCounter();
            updateCounter2();

            aboutMeInput.addEventListener('input', function() {
                updateCounter();
            });

            observationsInput.addEventListener('input', function(){
                updateCounter2();
            });

            function updateCounter() {
                let length = aboutMeInput.value.length;

                aboutMeCounter.textContent = length + "/1500";
                aboutMeCounter.classList.toggle('text-red-500', length > 1500);
            }

            function updateCounter2() {
                let length2 = observationsInput.value.length;

                observationsCounter.textContent = length2 + "/500";
                observationsCounter.classList.toggle('text-red-500', length > 500);
            }

        });
    </script>



</x-container>
