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
                    <x-text-input wire:model="last_name" type="text" class="w-full" id="last_name"
                        :placeholder="'Ingrese el apellido o los apellidos del estudiante'" />
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
                <p class="text-right text-sm text-gray-300 font-semibold"><span id="about_me_counter"
                        wire:ignore></span></p>
                <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
            </div>
        </div>

        {{-- Datos Academicos --}}
        <div>
            <x-secondary-title>Datos académicos</x-secondary-title>
            {{-- Nivel de estudios y titulo principal --}}
            <x-grid-container>
                {{-- Nivel de estudios --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('study_level')"
                        title="Agregar campo de Nivel de estudios">
                        <x-label for="study_level_0">Nivel de estudios</x-label>
                    </x-add-input-field>

                    <div class="space-y-2">
                        {{-- Ciclo para agregar mas campos de Nivel de estudios --}}
                        @foreach ($study_level as $key => $value)
                            <x-remove-input-field wire:click="removeInput('study_level',{{ $key }})"
                                title="Quitar campo de Nivel de estudios">
                                <x-text-input id="study_level_{{ $key }}"
                                    wire:model="study_level.{{ $key }}" type="text" class="w-full"
                                    :placeholder="'Ejemplos: Licenciatura en..., Maestría en..., Doctorado en...'" />
                            </x-remove-input-field>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('study_level.0')" class="mt-2" />
                </div>

                {{-- Titulo Principal --}}
                <div class="w-full">
                    <x-label for="degree">Título principal</x-label>
                    <x-text-input wire:model="degree" type="text" class="w-full" id="degree" :placeholder="'Ejemplo: Ingeniero Químico'" />
                    <x-input-error :messages="$errors->get('degree')" class="mt-2" />
                </div>
            </x-grid-container>

            <x-grid-container>

                {{-- Logros academicos --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('academic_achievements')"
                        title="Agregar campo de Logros académicos">
                        <x-label for="academic_achievement_0">Logros académicos</x-label>
                    </x-add-input-field>

                    <div class="space-y-2">
                        {{-- Ciclo para imprimir mas Academic Achievement fields  --}}
                        @foreach ($academic_achievements as $key => $value)
                            <x-remove-input-field wire:click="removeInput('academic_achievements',{{ $key }})"
                                title="Quitar campo de Logros académicos">
                                <x-text-input id="academic_achievement_{{ $key }}"
                                    wire:model="academic_achievements.{{ $key }}" type="text" class="w-full"
                                    :placeholder="'Ejemplos: cursos, diplomados, talleres'" />
                            </x-remove-input-field>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('academic_achievements.0')" class="mt-2" />
                </div>
            </x-grid-container>
        </div>

        {{-- Datos Experiencia y Proyectos --}}
        <div>
            {{-- Datos Experiencia --}}
            <x-secondary-title>Experiencia</x-secondary-title>
            <x-grid-container>
                {{-- Experiencia --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('experience')" title="Agregar campo de Experiencia">
                        <x-label for="experience_0">Experiencia</x-label>
                    </x-add-input-field>
                    <div class="space-y-2">
                        {{-- Ciclo para imprimir mas Academic Achievement fields  --}}
                        @foreach ($experience as $key => $value)
                            <x-remove-input-field wire:click="removeInput('experience',{{ $key }})"
                                title="Quitar campo de Experiencia">
                                <x-text-input id="experience_{{ $key }}"
                                    wire:model="experience.{{ $key }}" type="text" class="w-full"
                                    :placeholder="'Ingrese un área de experiencia'" />
                            </x-remove-input-field>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('experience.0')" class="mt-2" />
                </div>

                {{-- Proyectos --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('projects')" title="Agregar campo de Proyectos">
                        <x-label for="projects_0">Proyectos</x-label>
                    </x-add-input-field>
                    <div class="space-y-2">
                        {{-- Ciclo para imprimir mas Academic Achievement fields  --}}
                        @foreach ($projects as $key => $value)
                            <x-remove-input-field wire:click="removeInput('projects',{{ $key }})"
                                title="Quitar campo de Proyectos">
                                <x-text-input id="projects_{{ $key }}"
                                    wire:model="projects.{{ $key }}" type="text" class="w-full"
                                    :placeholder="'Ejemplo: Proyecto de vinos'" />
                            </x-remove-input-field>
                        @endforeach
                    </div>
                </div>

            </x-grid-container>
        </div>

        {{-- Datos Referencias --}}
        <div>
            <x-secondary-title>Referencias</x-secondary-title>
            <x-grid-container>
                {{-- Referencias --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('references')" title="Agregar campo de Referencias">
                        <x-label for="references">Proyectos</x-label>
                    </x-add-input-field>
                    <div class="space-y-2">
                        @foreach ($references as $key => $value)
                            <x-remove-input-field wire:click="removeInput('references',{{ $key }})"
                                title="Quitar campo de Referencias" style="top: 9px; bottom:auto;">

                                {{-- Contenedor de Referencias --}}
                                <div class="space-y-1">

                                    {{-- Nombre de la referencia  --}}
                                    <div class="flex items-center">
                                        <label for="reference_name_{{ $key }}"
                                            class="w-28 px-3 py-2 bg-gris-ph font-semibold rounded-l-lg border"
                                            style="min-with:100px;">Nombre</label>
                                        <x-text-input type="text" class="w-full"
                                            id="reference_name_{{ $key }}"
                                            wire:model="references.{{ $key }}.name" :placeholder="'Ingrese el nombre de la referencia'"
                                            style="border: 1px solid #E8E8E8; border-top-left-radius: 0; border-bottom-left-radius: 0; margin:0">
                                        </x-text-input>
                                    </div>
                                    <x-input-error :messages="$errors->get('references.0.name')" class="my-2" />

                                    {{-- Correo de la referencia --}}
                                    <div class="flex items-center mb-1">
                                        <label for="reference_email_{{ $key }}"
                                            class="w-28 px-3 py-2 bg-gris-ph font-semibold rounded-l-lg border"
                                            style="min-with:100px;">Correo</label>
                                        <x-text-input type="email" class="w-full"
                                            id="reference_email_{{ $key }}"
                                            wire:model="references.{{ $key }}.email" :placeholder="'Ingrese el correo de la referencia'"
                                            style="border: 1px solid #E8E8E8; border-top-left-radius: 0; border-bottom-left-radius: 0; margin:0">
                                        </x-text-input>
                                    </div>
                                    <x-input-error :messages="$errors->get('references.0.email')" class="my-2" />

                                    {{-- Telefono de la referencia --}}
                                    <div class="flex items-center mb-1">
                                        <label for="reference_phone_{{ $key }}"
                                            class="w-28 px-3 py-2 bg-gris-ph font-semibold rounded-l-lg border"
                                            style="min-with:100px;">Teléfono</label>
                                        <x-text-input type="text" class="w-full"
                                            id="reference_phone_{{ $key }}"
                                            wire:model="references.{{ $key }}.phone" :placeholder="'Ingrese el número telefónico de la referencia'"
                                            style="border: 1px solid #E8E8E8; border-top-left-radius: 0; border-bottom-left-radius: 0; margin:0">
                                        </x-text-input>
                                    </div>
                                    <x-input-error :messages="$errors->get('references.0.phone')" class="my-2" />

                                </div>
                            </x-remove-input-field>
                        @endforeach
                    </div>
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
            var aboutMeInput = document.getElementById('about_me');
            var aboutMeCounter = document.getElementById('about_me_counter');

            updateCounter();

            aboutMeInput.addEventListener('input', function() {
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
