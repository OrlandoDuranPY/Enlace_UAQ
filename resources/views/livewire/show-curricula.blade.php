<div
    class="overflow-y-scroll lg:overflow-y-hidden scrollbar-none lg:flex lg:flex-row gap-20 w-full box-border pb-20 h-full overflow-hidden">
    <!-- ========================================
       Formulario y grid de Curriculumns
    ======================================== -->
    <div class="w-full lg:w-7/12 h-full space-y-5 md:space-y-10 box-border">
        {{-- Formulario de busqueda  --}}
        <livewire:search-curriculum class="md:w-full" />
        <h1 class="font-semibold text-xl md:text-2xl uppercase">Curriculums</h1>
        {{-- Grid de Curriculumns --}}
            <div class=" box-border pb-10 lg:pb-0 h-4/5 lg:h-5/6 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 ">
                {{-- Contenedor de tarjetas / GRID  --}}
                <div class="grid sm:grid-col-1 md:grid-cols-2 lg:grid-cols-3 gap-5 box-border pr-2 p-1">

                @forelse ($curricula as $curriculum)
                    <!-- ========================================
                   Tarjeta
                ======================================== -->
                    <div wire:click='showCurriculum({{ $curriculum->id }})'
                        class="h-auto md:h-60 box-border shadow-md rounded-lg overflow-hidden bg-gris-tarjeta relative cursor-pointer
                        {{ $selectedCard == $curriculum->id ? 'ring-2 ring-rojo' : '' }}">
                        <div class="  px-4 pb-12 md:pb-3 pt-3">
                            <!-- ========================================
                           Programa academico
                        ======================================== -->
                            @if ($curriculum->academic_programs_id)
                                <p class="text-right font-semibold text-gray-400 mb-2 truncate">
                                    {{ $curriculum->academicProgram->name }}</p>
                            @else
                                <p class="text-right font-semibold text-gray-400 mb-2 truncate">Docente</p>
                            @endif

                            <!-- ========================================
                           Nombre
                        ======================================== -->
                            <h2 class="text-base font-semibold truncate"> {{ $curriculum->name }}
                                {{ $curriculum->last_name }}</h2>

                            <!-- ========================================
                        Rol/Titulo Principal
                        ======================================== -->
                            @if ($curriculum->semester >= 1 && $curriculum->semester <= 9)
                                <p class="text-gray-400 text-sm font-semibold mb-2 truncate">Estudiante</p>
                            @elseif($curriculum->semester == 10)
                                <p class="text-gray-400 text-sm font-semibold mb-2 truncate">Egresado</p>
                            @else
                                <p class="text-gray-400 text-sm font-semibold mb-2 truncate">{{ $curriculum->degree }}
                                </p>
                            @endif

                            <!-- ========================================
                           Experiencia
                        ======================================== -->
                            <h3 class="text-base font-semibold">Experiencia</h3>
                            <ul class="text-sm list-disc truncate">
                                @foreach (json_decode($curriculum->experience) as $key => $experience)
                                    @if ($key < 3)
                                        <li class="ml-5 text-gray-400">{{ Str::limit($experience, 25) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="bg-verde text-center text-white font-semibold py-1 absolute bottom-0 w-full">
                            <p>Ver CV</p>
                        </div>
                    </div>
                @empty
                    <p class="absolute text-gris-texto">No hay curriculums por mostrar</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ========================================
       Preview de los Curriculumns
    ======================================== -->

    @if ($selectedCurriculum)
        <!-- ========================================
           Mostrar preview al dar click en una ficha
           Pantallas grandes
        ======================================== -->
        <div
            class="hidden lg:block w-5/12 bg-gris-ph rounded-lg p-6 overflow-y-auto scrollbar-none border-box space-y-5 relative">
            <!-- ========================================
               Header
            ======================================== -->
            <div class="relative">
                {{-- Botones de Accion --}}
                @auth
                    <div class="absolute top-0 left-0 flex gap-2">
                        {{-- Editar y eliminar Estudiantes --}}
                        @if ($selectedCurriculum->type === 3)
                            <a href="#"><img
                                    class="h-8" src="{{ asset('img/edit.svg') }}" alt="Editar curriculum"></a>
                        @else
                            <a href="{{route('curricula.student.update', $selectedCurriculum->id)}}"><img
                                    class="h-8" src="{{ asset('img/edit.svg') }}" alt="Editar curriculum"></a>
                        @endif
                        <button wire:click="$emit('deleteCurriculumJS', {{ $selectedCurriculum->id }})"><img
                            class="h-8" src="{{ asset('img/delete.svg') }}" alt="Eliminar curriculum"></button>
                    </div>
                @endauth

                <div>
                    {{-- Programa Academico o Docente --}}
                    @if ($selectedCurriculum->academic_programs_id)
                        <p class="text-right text-2xl font-semibold text-gray-400 truncate">
                            {{ $selectedCurriculum->academicProgram->name }}</p>
                    @else
                        <p class="text-right text-2xl font-semibold text-gray-400 truncate">Docente</p>
                    @endif
                </div>
            </div>

            {{-- Nombre --}}
            <p class="text-xl lg:text-3xl font-semibold">{{ $selectedCurriculum->name }}
                {{ $selectedCurriculum->last_name }}</p>
            {{-- Estudiante/Egresado Programa de Estudios o Titulo Principal --}}
            @if ($selectedCurriculum->semester >= 1 && $selectedCurriculum->semester <= 9)
                <p class="text-gray-400 text-2xl font-semibold">Estudiante de:
                    {{ $selectedCurriculum->studyProgram->name }}</p>
            @elseif($selectedCurriculum->semester == 10)
                <p class="text-gray-400 text-2xl font-semibold">Egresado de:
                    {{ $selectedCurriculum->studyProgram->name }}</p>
            @else
                <p class="text-gray-400 text-2xl font-semibold">{{ $selectedCurriculum->degree }}</p>
            @endif

            <!-- ========================================
               Acerca de mi
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Acerca de mí</h2>
                <p class="text-justify text-sm">{{ $selectedCurriculum->about_me }}</p>
            </div>

            <!-- ========================================
               Academico
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Académico</h2>
                <ul class="text-sm list-disc">
                    {{-- Semestre / Egresado --}}
                    @if ($selectedCurriculum->semester && $selectedCurriculum->semester != 10)
                        <li class="ml-5">{{ $selectedCurriculum->semester }}° Semestre</li>
                    @elseif ($selectedCurriculum->semester && $selectedCurriculum->semester == 10)
                        <li class="ml-5">Egresado</li>
                    @endif
                    {{-- Nivel de Estudios --}}
                    @if ($selectedCurriculum->studyLevel)
                        @foreach (json_decode($selectedCurriculum->studyLevel) as $studyLevel)
                            <li class="ml-5">{{ $studyLevel }}</li>
                        @endforeach
                    @endif
                    {{-- Logros Academicos --}}
                    @foreach (json_decode($selectedCurriculum->academic_achievements) as $academic_achievement)
                        <li class="ml-5">{{ $academic_achievement }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- ========================================
               EXperiencia
            ======================================== -->
            <div>
                <h2 class="text-xl lg:text-3xl text-rojo font-bold">Experiencia</h2>
                <ul class="text-sm list-disc">
                    @foreach (json_decode($selectedCurriculum->experience) as $experience)
                        <li class="ml-5">{{ $experience }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- ========================================
               Proyectos
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Proyectos</h2>
                <ul class="text-sm list-disc">
                    @foreach (json_decode($selectedCurriculum->projects) as $project)
                        <li class="ml-5">{{ $project }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- ========================================
               Contacto
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Contacto</h2>
                <ul class="text-sm list-disc">
                    <li class="ml-5">Correo: {{ $selectedCurriculum->email }}</li>
                    <li class="ml-5">Teléfono: {{ $selectedCurriculum->phone }}</li>
                </ul>
            </div>

            <!-- ========================================
               Referencias
            ======================================== -->
            <div>
                <h2 class="text-2xl text-rojo font-bold">Referencias</h2>
                <ul class="text-sm list-disc space-y-2">
                    @foreach (json_decode($selectedCurriculum->references) as $reference)
                        <div>
                            <p class="">{{ $reference->name }}</p>
                            <li class="ml-5">{{ $reference->email }}</li>
                            <li class="ml-5">{{ $reference->phone }}</li>
                        </div>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- ========================================
           Mostrar preview al dar click en una ficha
           Pantallas chicas y medianas
        ======================================== -->
        <div
            class="absolute top-0 left-0 right-0 bottom-0 lg:hidden w-full h-full bg-gris-ph overflow-y-auto scrollbar-none border-box z-50 p-5 md:p-10">
            <!-- ========================================
               Contenedor Principal
            ======================================== -->
            <div class="relative space-y-5">
                <!-- ========================================
               Header
            ======================================== -->
                <div class="relative">
                    {{-- Botones de Accion --}}
                    @auth
                        <div class="absolute top-0 left-0 flex gap-2">
                            {{-- Editar y eliminar Estudiantes --}}
                            @if ($selectedCurriculum->type === 3)
                                <a href="#"><img
                                        class="h-8" src="{{ asset('img/edit.svg') }}" alt="Editar curriculum"></a>
                            @else
                                <a href="{{route('curricula.student.update', $selectedCurriculum->id)}}"><img
                                        class="h-8" src="{{ asset('img/edit.svg') }}" alt="Editar curriculum"></a>
                            @endif
                            <button wire:click="$emit('deleteCurriculumJS', {{ $selectedCurriculum->id }})"><img
                                class="h-8" src="{{ asset('img/delete.svg') }}" alt="Eliminar curriculum"></button>
                        </div>
                    @endauth

                    <div>
                        {{-- Programa Academico o Docente --}}
                        @if ($selectedCurriculum->academic_programs_id)
                            <p class="text-right font-semibold text-gray-400 truncate">
                                {{ $selectedCurriculum->academicProgram->name }}</p>
                        @else
                            <p class="text-right font-semibold text-gray-400 truncate">Docente</p>
                        @endif
                    </div>
                </div>

                {{-- Nombre --}}
                <p class="font-semibold text-xl">{{ $selectedCurriculum->name }}
                    {{ $selectedCurriculum->last_name }}</p>
                {{-- Estudiante/Egresado Programa de Estudios o Titulo Principal --}}
                @if ($selectedCurriculum->semester >= 1 && $selectedCurriculum->semester <= 9)
                    <p class="text-gray-400 font-semibold">Estudiante de:
                        {{ $selectedCurriculum->studyProgram->name }}</p>
                @elseif($selectedCurriculum->semester == 10)
                    <p class="text-gray-400 font-semibold">Egresado de:
                        {{ $selectedCurriculum->studyProgram->name }}</p>
                @else
                    <p class="text-gray-400 font-semibold">{{ $selectedCurriculum->degree }}</p>
                @endif


                <!-- ========================================
               Acerca de mi
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Acerca de mí</h2>
                    <p class="text-justify text-sm">{{ $selectedCurriculum->about_me }}</p>
                </div>


                <!-- ========================================
               Academico
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Académico</h2>
                    <ul class="text-sm list-disc">
                        {{-- Semestre / Egresado --}}
                        @if ($selectedCurriculum->semester && $selectedCurriculum->semester != 10)
                            <li class="ml-5">{{ $selectedCurriculum->semester }}° Semestre</li>
                        @elseif ($selectedCurriculum->semester && $selectedCurriculum->semester == 10)
                            <li class="ml-5">Egresado</li>
                        @endif
                        {{-- Nivel de Estudios --}}
                        @if ($selectedCurriculum->studyLevel)
                            @foreach (json_decode($selectedCurriculum->studyLevel) as $studyLevel)
                                <li class="ml-5">{{ $studyLevel }}</li>
                            @endforeach
                        @endif
                        {{-- Logros Academicos --}}
                        @foreach (json_decode($selectedCurriculum->academic_achievements) as $academic_achievement)
                            <li class="ml-5">{{ $academic_achievement }}</li>
                        @endforeach
                    </ul>
                </div>


                <!-- ========================================
               EXperiencia
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Experiencia</h2>
                    <ul class="text-sm list-disc">
                        @foreach (json_decode($selectedCurriculum->experience) as $experience)
                            <li class="ml-5">{{ $experience }}</li>
                        @endforeach
                    </ul>
                </div>


                <!-- ========================================
               Proyectos
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Proyectos</h2>
                    <ul class="text-sm list-disc">
                        @foreach (json_decode($selectedCurriculum->projects) as $project)
                            <li class="ml-5">{{ $project }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- ========================================
               Contacto
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Contacto</h2>
                    <ul class="text-sm list-disc">
                        <li class="ml-5">Correo: {{ $selectedCurriculum->email }}</li>
                        <li class="ml-5">Teléfono: {{ $selectedCurriculum->phone }}</li>
                    </ul>
                </div>

                <!-- ========================================
               Referencias
            ======================================== -->
                <div>
                    <h2 class="text-xl text-rojo font-bold">Referencias</h2>
                    <ul class="text-sm list-disc space-y-2">
                        @foreach (json_decode($selectedCurriculum->references) as $reference)
                            <div>
                                <p class="">{{ $reference->name }}</p>
                                <li class="ml-5">{{ $reference->email }}</li>
                                <li class="ml-5">{{ $reference->phone }}</li>
                            </div>
                        @endforeach
                    </ul>
                </div>

                <!-- ========================================
               Boton para cerrar el curriculum
            ======================================== -->
                <div wire:click="closeCurriculum"
                    class="fixed bottom-5 md:bottom-10 right-5 md:right-10 bg-white shadow-md p-5 rounded-full w-5 h-5 flex items-center justify-center cursor-pointer hover:scale-110 transition">
                    <span class="text-gray-500"><i class="fas fa-times"></i></span></div>
            </div>

        </div>
    @else
        {{-- Mostar cuando no le has dado click a nada --}}
        <div class="hidden lg:block w-5/12 bg-gris-ph rounded-lg  border-box">
            <div class="w-full h-full flex justify-center items-center flex-col">
                <img class="h-32 mb-10" src="{{ asset('img/preview-icon.svg') }}" alt="Icono de preview">
                <p class="w-5/6 text-center text-2xl text-gray-400">Da clic en una ficha para cargar la información de
                    la
                    persona.</p>
            </div>
        </div>
    @endif

</div>
