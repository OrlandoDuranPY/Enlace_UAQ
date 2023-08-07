@props(['curriculum'])
<div wire:click='mostrarCurriculum({{ $curriculum->id }})'
    class="h-auto md:h-60 box-border shadow-md rounded-lg overflow-hidden bg-gris-tarjeta relative cursor-pointer">
    <div class="  px-4 pb-12 md:pb-3 pt-3">
        <!-- ========================================
       Programa academico
    ======================================== -->
        @if ($curriculum->academicProgram_id)
            <p class="text-right font-semibold text-gray-400 mb-2 truncate">
                {{ $curriculum->academicProgram->name }}</p>
        @else
            <p class="text-right font-semibold text-gray-400 mb-2 truncate">Docente</p>
        @endif

        <!-- ========================================
       Nombre
    ======================================== -->
        <h2 class="text-base font-semibold truncate"> {{ $curriculum->name }}
            {{ $curriculum->lastName }}</h2>

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