<div>
    <!-- ========================================
       Formulario para pantallas chicas y medianas
    ======================================== -->
    <form class="lg:hidden w-full lg:w-full container mx-auto flex flex-col lg:flex-row justify-center gap-5 p-1"
        wire:submit.prevent='readFilterTerms'>

        {{-- Buscador  --}}
        <x-text-input class="w-full lg:w-5/12" type="text" wire:model="term" :value="old('term')" placeholder="Buscar..." />

        <div class="grid grid-cols-2 gap-4">
            {{-- Filtros de busqueda --}}
            <x-select wire:model="user" class="w-full">
                <option class="b-gris" value="">-- Todos --</option>
                <option class="b-gris" value="1">Estudiantes</option>
                <option class="b-gris" value="2">Egresados</option>
                <option class="b-gris" value="3">Docentes</option>
                @auth
                    <option class="b-gris" value="4">Inactivos</option>
                @endauth
            </x-select>

            {{-- Submit --}}
            <x-primary-button class="w-full">Buscar</x-primary-button>

        </div>

    </form>

    <!-- ========================================
       Formulario para pantallas grandes
    ======================================== -->
    <form
        class="hidden w-full md:w-9/12 lg:w-full container mx-auto lg:flex flex-col lg:flex-row justify-center gap-5 p-1"
        wire:submit.prevent='readFilterTerms'>

        {{-- Buscador  --}}
        <x-text-input class="w-full lg:w-5/12" type="text" wire:model="term" :value="old('term')"
            placeholder="Buscar..." />

        {{-- Filtros de busqueda --}}
        <x-select wire:model="user" class="w-full">
            <option class="b-gris" value="">-- Todos --</option>
            <option class="b-gris" value="1">Estudiantes</option>
            <option class="b-gris" value="2">Egresados</option>
            <option class="b-gris" value="3">Docentes</option>
            @auth
                <option class="b-gris" value="4">Inactivos</option>
            @endauth
        </x-select>

        {{-- Submit --}}
        <x-primary-button class="w-full lg:w-4/12">Buscar</x-primary-button>

    </form>
</div>
