<div
    class="overflow-y-scroll lg:overflow-y-hidden scrollbar-none lg:flex lg:flex-row gap-20 w-full box-border pb-20 h-full overflow-hidden">
    <!-- ========================================
       Formulario y grid de Curriculumns
    ======================================== -->
    <div class="w-full lg:w-7/12 h-full space-y-5 md:space-y-10 box-border">
        {{-- Formulario de busqueda  --}}
        <livewire:search-curriculum class="md:w-full" />
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

                            {{-- Salario --}}
                            <p class="text-gray-400 text-sm font-semibold mb-2 truncate">
                                @if ($vacancy->salary)
                                    {{ $vacancy->salary }}
                                @else
                                    Salario pendiente
                                @endif
                            </p>

                            {{-- Horario --}}
                            <p class="text-sm font-semibold mb-2 truncate">Lunes a Viernes de 8:00 a 17:00</p>


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
        <x-lg-preview :selectedVacancy='$selectedVacancy'>

        </x-lg-preview>
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
