<div class="w-8/12 lg:w-10/12">
    <!-- ========================================
       Formulario para pantallas chicas y medianas
    ======================================== -->
    <form class="lg:hidden w-full container mx-auto flex flex-col justify-center gap-5 p-1"
        wire:submit.prevent='search'>

        {{-- Buscador  --}}
        <x-text-input class="w-full" type="text" wire:model="term" :value="old('term')" placeholder="Buscar..." requried/>
        <x-input-error :messages="$errors->get('term')" class="mt-2" />

        <div class="grid w-full gap-4">
            {{-- Filtros de busqueda --}}
            <x-select wire:model="docType" class="w-full" required>
                <option class="b-gris" value="">-- Selecciona una opción --</option>
                <option class="b-gris" value="curricula">Curriculums</option>
                <option class="b-gris" value="vacancies">Vacantes</option>
            </x-select>
            <x-input-error :messages="$errors->get('docType')" class="mt-2" />

            {{-- Submit --}}
            <x-primary-button class="w-full">Buscar</x-primary-button>

        </div>

    </form>


    <!-- ========================================
       Formulario para pantallas grandes
    ======================================== -->
    <form class="hidden lg:w-full container mx-auto lg:flex justify-center gap-5 p-1"
        wire:submit.prevent='search'>

        {{-- Buscador  --}}
        <x-text-input class="w-5/12" type="text" wire:model="term" :value="old('term')" placeholder="Buscar..." required/>
        {{-- <x-input-error :messages="$errors->get('term')" class="mt-2" /> --}}

        {{-- Filtros de busqueda --}}
        <x-select wire:model="docType" class="w-full" required>
            <option class="b-gris" value="">-- Selecciona una opción --</option>
            <option class="b-gris" value="curricula">Curriculums</option>
            <option class="b-gris" value="vacancies">Vacantes</option>
        </x-select>
        {{-- <x-input-error :messages="$errors->get('docType')" class="mt-2" /> --}}


        {{-- Submit --}}
        <x-primary-button class="w-2/12">Buscar</x-primary-button>

    </form>
</div>
