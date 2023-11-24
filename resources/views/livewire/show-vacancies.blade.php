<div
    class="overflow-y-scroll lg:overflow-y-hidden scrollbar-none lg:flex lg:flex-row gap-20 w-full box-border pb-20 h-full overflow-hidden">
    <!-- ========================================
       Formulario y grid de Curriculumns
    ======================================== -->
    <div class="w-full lg:w-7/12 h-full space-y-5 md:space-y-10 box-border">
        {{-- Formulario de busqueda  --}}
        <livewire:search-vacancy class="md:w-full" />
        <h1 class="font-semibold text-xl md:text-2xl uppercase">Vacantes</h1>
        {{-- Grid de Curriculumns --}}
        <div class=" box-border pb-10 lg:pb-0 h-4/5 lg:h-5/6 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 ">
            {{-- Contenedor de tarjetas / GRID  --}}
            <div class="grid sm:grid-col-1 md:grid-cols-2 lg:grid-cols-3 gap-5 box-border pr-2 p-1">

                @forelse ($vacancies as $vacancy)
                    <!-- ========================================
                   Tarjeta
                ======================================== -->
                    <x-card wire:click='showVacancy({{ $vacancy->id }})'
                        class="{{ $selectedCard == $vacancy->id ? 'ring-2 ring-rojo' : '' }}">
                        {{-- Informacion que se muestra en el preview de la tarjeta --}}
                        <x-slot:cardInfo>

                            {{-- Compañia --}}
                            <p class="text-right font-semibold text-gray-400 mb-2 truncate">
                                {{ $vacancy->company }}</p>

                            {{-- Puesto de trabajo --}}
                            <p class="text-base font-semibold truncate mb-2">{{ $vacancy->job_title }}</p>
                            {{-- Horario --}}
                            <p class="text-sm font-semibold mb-2 truncate">{{ $vacancy->schedule }}</p>
                            {{-- Salario --}}
                            <p class="text-gray-400 text-sm font-semibold mb-2 truncate">
                                @if ($vacancy->salary)
                                    {{ $vacancy->salary }}
                                @else
                                    Salario pendiente
                                @endif
                            </p>

                            <p class="text-sm text-gray-400">
                                {{ substr($vacancy->description, 0, 70) . (strlen($vacancy->description) > 100 ? '...' : '') }}
                            </p>



                        </x-slot:cardInfo>

                        {{-- Titulo que aparece en el boton para previsualizar --}}
                        <x-slot:button>Ver Vacante</x-slot:button>
                    </x-card>

                @empty
                    <p class="absolute text-gris-texto">No hay vacantes por mostrar</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ========================================
       Preview de los Curriculumns
    ======================================== -->

    @if ($selectedVacancy)
        {{-- Preview para pantallas grandes --}}
        <x-lg-preview :selectedItem='$selectedVacancy'>
            <!-- ========================================
       Header
    ======================================== -->
            <div class="relative">
                {{-- Botones de Accion --}}
                @auth
                    <div class="absolute top-0 left-0 flex gap-2">
                        {{-- Editar y eliminar Estudiantes --}}
                        <a href="{{ route('vacancies.update', $selectedVacancy->id) }}"><img class="h-8"
                                src="{{ asset('img/edit.svg') }}" alt="Editar vacante"></a>
                        <button wire:click="$emit('deleteVacancyJS', {{ $selectedVacancy->id }})"><img class="h-8"
                                src="{{ asset('img/delete.svg') }}" alt="Eliminar vacante"></button>
                    </div>
                @endauth

                <div>
                    {{-- Nombre de la empresa --}}
                    <p class="text-right text-2xl font-semibold text-gray-400 truncate">
                        {{ $selectedVacancy->company }}</p>
                </div>
            </div>

            {{-- Nombre del puesto --}}
            <p class="text-3xl font-semibold">{{ $selectedVacancy->job_title }}</p>
            {{-- Horario --}}
            <p class="text-2xl font-semibold">{{ $selectedVacancy->schedule }}</p>
            <div class="space-y-2">
                {{-- Ubicacion de la empresa --}}
                <p class="text-xl font-semibold text-gray-400 truncate">{{ $selectedVacancy->location }}</p>

                {{-- Salario --}}
                @if ($selectedVacancy->salary)
                    <p class="text-gray-400 text-xl font-semibold">{{ $selectedVacancy->salary }}</p>
                @else
                    <p class="text-gray-400 text-xl font-semibold">Salario pendiente</p>
                @endif

            </div>



            <!-- ========================================
               Descripción de la vacante
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Descripción</h2>
                <p class="text-sm">{{ $selectedVacancy->description }}</p>
            </div>

            <!-- ========================================
               Observaciones de la vacante
            ======================================== -->
            @if ($selectedVacancy->observations)
                <div>
                    <h2 class="text-2xl text-rojo font-bold">Observaciones</h2>
                    <p class="text-sm">{{ $selectedVacancy->observations }}</p>
                </div>
            @endif

            <!-- ========================================
               Datos de contacto
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Contacto</h2>
                <ul class="text-sm list-disc">
                    {{-- Telefono --}}
                    <li class="ml-5">{{ $selectedVacancy->phone }}° Semestre</li>
                    {{-- Correo --}}
                    <li class="ml-5">{{ $selectedVacancy->email }}° Semestre</li>
                </ul>
            </div>
        </x-lg-preview>

        {{-- Mostrar Preview en pantallas moviles --}}
        <x-mobile-preview>
            <!-- ========================================
       Header
    ======================================== -->
            <div class="relative">
                {{-- Botones de Accion --}}
                @auth
                    <div class="absolute top-0 left-0 flex gap-2">
                        {{-- Editar y eliminar Estudiantes --}}
                        <a href="{{ route('vacancies.update', $selectedVacancy->id) }}"><img class="h-8"
                                src="{{ asset('img/edit.svg') }}" alt="Editar vacante"></a>
                        <button wire:click="$emit('deleteVacancyJS', {{ $selectedVacancy->id }})"><img class="h-8"
                                src="{{ asset('img/delete.svg') }}" alt="Eliminar vacante"></button>
                    </div>
                @endauth

                <div>
                    {{-- Nombre de la empresa --}}
                    <p class="text-right text-xl md:text-2xl font-semibold text-gray-400 truncate">
                        {{ $selectedVacancy->company }}</p>
                </div>
            </div>

            {{-- Nombre del puesto --}}
            <p class="text-2xl md:text-2xl font-semibold">{{ $selectedVacancy->job_title }}</p>

            <div class="space-y-2">
                {{-- Ubicacion de la empresa --}}
                <p class="text-xl font-semibold text-gray-400">{{ $selectedVacancy->location }}</p>

                {{-- Salario --}}
                @if ($selectedVacancy->salary)
                    <p class="text-gray-400 text-xl font-semibold">{{ $selectedVacancy->salary }}</p>
                @else
                    <p class="text-gray-400 text-xl font-semibold">Salario pendiente</p>
                @endif

                {{-- Horario --}}
                <p class="text-xl font-semibold text-gray-400">{{ $selectedVacancy->schedule }}</p>
            </div>



            <!-- ========================================
                           Descripción de la vacante
                        ======================================== -->
            <div>
                <h2 class="text-xl md:text-2xl text-rojo font-bold">Descripción</h2>
                <p class="text-sm">{{ $selectedVacancy->description }}</p>
            </div>

            <!-- ========================================
                           Observaciones de la vacante
                        ======================================== -->
            @if ($selectedVacancy->observations)
                <div>
                    <h2 class="text-xl md:text-2xl text-rojo font-bold">Observaciones</h2>
                    <p class="text-sm">{{ $selectedVacancy->observations }}</p>
                </div>
            @endif

            <!-- ========================================
               Datos de contacto
            ======================================== -->
            <div>
                <h2 class="text-xl text-rojo font-bold">Contacto</h2>
                <ul class="text-sm list-disc">
                    {{-- Telefono --}}
                    <li class="ml-5">{{ $selectedVacancy->phone }}</li>
                    {{-- Correo --}}
                    <li class="ml-5">{{ $selectedVacancy->email }}</li>
                </ul>
            </div>

        </x-mobile-preview>
    @else
        {{-- Mostar cuando no le has dado click a nada --}}
        <div class="hidden lg:block w-5/12 bg-gris-ph rounded-lg  border-box">
            <div class="w-full h-full flex justify-center items-center flex-col">
                <img class="h-32 mb-10" src="{{ asset('img/preview-icon.svg') }}" alt="Icono de preview">
                <p class="w-5/6 text-center text-2xl text-gray-400">Da clic en una ficha para cargar la información de
                    la vacante.</p>
            </div>
        </div>
    @endif

</div>
