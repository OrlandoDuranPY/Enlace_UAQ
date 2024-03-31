<x-container>
    <form class="space-y-10 lg:space-y-20 pb-10" wire:submit.prevent='createVacancy' novalidate>
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
                    <x-text-input wire:model="salary" type="text" class="w-full" id="salary" :placeholder="'Ejemplo: $10,000 - $15,000 mensuales'" />
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                </div>
            </x-grid-container>

            <x-grid-container>
                {{-- Horario --}}
                <div class="w-full">
                    <x-label for="schedule">Horario</x-label>
                    <x-text-input wire:model="schedule" type="text" class="w-full" id="schedule"
                        :placeholder="'Ejemplo: Lunes a Viérnes, 8:00 a.m. a 6:00 p.m.'" />
                    <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
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
                <x-text-area wire:model="observations" class="w-full" id="observations" :placeholder="'Escriba puntos que quiera resaltar de la vacante'"
                    wire:ignore />
                <p class="text-right text-sm text-gray-300 font-semibold"><span id="observations_counter"
                        wire:ignore></span></p>
                <x-input-error :messages="$errors->get('observations')" class="mt-2" />
            </div>

        </div>

        {{-- Datos de contacto --}}
        <div>
            <x-secondary-title>Datos de contacto</x-secondary-title>
            {{-- Numero y correo --}}
            <x-grid-container>
                {{-- Telefono --}}
                <div class="w-full">
                    <x-label for="phone">Teléfono</x-label>
                    <x-text-input wire:model="phone" type="text" class="w-full" id="phone"
                        :placeholder="'Ingrese el teléfono de contacto'" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                {{-- Correo --}}
                <div class="w-full">
                    <x-label for="email">Correo</x-label>
                    <x-text-input wire:model="email" type="email" class="w-full" id="email"
                        :placeholder="'Ingrese el correo de contacto'" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </x-grid-container>

        </div>

        <x-primary-button class="block mx-auto">Finalizar registro</x-primary-button>
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

            observationsInput.addEventListener('input', function() {
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
