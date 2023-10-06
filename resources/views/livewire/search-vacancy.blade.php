<div>
    <!-- ========================================
       Formulario para pantallas chicas y medianas
    ======================================== -->
    <form class="lg:hidden w-full lg:w-full container mx-auto flex flex-col lg:flex-row justify-center gap-5 p-1"
        wire:submit.prevent='readFilterTerms'>

        {{-- Buscador  --}}
        <x-text-input class="w-full lg:w-5/12" type="text" wire:model="term" :value="old('term')"
            placeholder="Buscar..." />

            {{-- Submit --}}
            <x-primary-button class="w-full">Buscar</x-primary-button>

    </form>

    <!-- ========================================
       Formulario para pantallas grandes
    ======================================== -->
    <form
        class="hidden w-full md:w-9/12 lg:w-full container mx-auto lg:flex flex-col lg:flex-row justify-center gap-5 p-1"
        wire:submit.prevent='readFilterTerms'>

        {{-- Buscador  --}}
        <x-text-input class="w-full w-12/12" type="text" wire:model="term" :value="old('term')"
            placeholder="Buscar..." />

        {{-- Submit --}}
        <x-primary-button class="w-full lg:w-4/12">Buscar</x-primary-button>

    </form>
</div>
