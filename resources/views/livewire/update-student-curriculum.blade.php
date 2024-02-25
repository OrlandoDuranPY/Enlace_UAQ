<x-container>
    <form class="space-y-10 lg:space-y-20 pb-10" wire:submit.prevent='updateCurriculum' novalidate>
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

        {{-- Datos Academicos --}}
        <div>
            <x-secondary-title>Datos académicos</x-secondary-title>
            {{-- Programa de Estudios y Semestre --}}
            <x-grid-container>
                {{-- Programa de Estudios --}}
                <div class="w-full">
                    <x-label for="study_program">Programa de estudios</x-label>
                    <x-select wire:model="study_programs_id" id="study_program">
                        <x-select-option value="">-- Selecciona una opción --</x-select-option>
                        @foreach ($study_programs as $study_program)
                            <x-select-option value="{{ intval($study_program->id) }}">{{ $study_program->name }}
                            </x-select-option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('study_programs_id')" class="mt-2" />
                </div>

                {{-- Semestre --}}
                <div class="w-full">
                    <x-label for="semester">Semestre</x-label>
                    <x-select wire:model="semester" id="semester">
                        <x-select-option value="">-- Selecciona una opción --</x-select-option>
                        <x-select-option value="1">1°</x-select-option>
                        <x-select-option value="2">2°</x-select-option>
                        <x-select-option value="3">3°</x-select-option>
                        <x-select-option value="4">4°</x-select-option>
                        <x-select-option value="5">5°</x-select-option>
                        <x-select-option value="6">6°</x-select-option>
                        <x-select-option value="7">7°</x-select-option>
                        <x-select-option value="8">8°</x-select-option>
                        <x-select-option value="9">9°</x-select-option>
                        <x-select-option value="10">Egresado</x-select-option>
                    </x-select>
                    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                </div>
            </x-grid-container>

            {{-- Logros Academicos y Programa Academico --}}
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
                            <x-remove-input-field
                                wire:click="removeInput('academic_achievements',{{ $key }})"
                                title="Quitar campo de Logros académicos">
                                <x-text-input id="academic_achievement_{{ $key }}"
                                    wire:model="academic_achievements.{{ $key }}" type="text" class="w-full"
                                    :placeholder="'Ejemplos: cursos, diplomados, talleres'" />
                            </x-remove-input-field>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('academic_achievements.0')" class="mt-2" />
                </div>

                {{-- Programa Academico --}}
                <div class="w-full">
                    <x-label for="academic_program">Programa académico</x-label>
                    {{-- Opciones del Input Radio --}}
                    @foreach ($academic_programs as $academic_program)
                        <div class="flex items-center gap-2">
                            <input type="radio" id="{{ $academic_program->id }}" wire:model="academic_programs_id"
                                name="academic_program" value="{{ intval($academic_program->id) }}">
                            <label for="{{ $academic_program->id }}"
                                class="font-semibold">{{ $academic_program->name }}</label>
                        </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('academic_programs_id')" class="mt-2" />
                </div>
            </x-grid-container>
        </div>

        {{-- Datos Experiencia --}}
        <div>
            <x-secondary-title>Experiencia</x-secondary-title>
            {{-- Experiencia y Proyectos --}}
            <x-grid-container>
                {{-- Experiencia --}}
                <div class="w-full">
                    <x-add-input-field wire:click.prevent="addInput('experience')"
                        title="Agregar campo de Experiencia">
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
                    <x-add-input-field wire:click.prevent="addInput('projects')"
                        title="Agregar campo de Proyectos">
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
                    <x-add-input-field wire:click.prevent="addInput('references')"
                        title="Agregar campo de Referencias">
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

        <x-primary-button class="block mx-auto">Actualizar registro</x-primary-button>
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
