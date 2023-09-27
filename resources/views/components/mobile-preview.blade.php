@props(['selectedItem'])
<div
    {{ $attributes->merge(['class' => 'absolute top-0 left-0 right-0 bottom-0 lg:hidden w-full h-full bg-gris-ph overflow-y-auto scrollbar-none border-box z-50 p-5 md:p-10']) }}>
    {{-- Contenedor prinicpal --}}
    <div class="relative space-y-3">
        {{ $slot }}
        <!-- ========================================
               Boton para cerrar el curriculum
            ======================================== -->
        <div wire:click="closePreview"
            class="fixed bottom-5 md:bottom-10 right-5 md:right-10 bg-white shadow-md p-5 rounded-full w-5 h-5 flex items-center justify-center cursor-pointer hover:scale-110 transition">
            <span class="text-gray-500"><i class="fas fa-times"></i></span>
        </div>
    </div>
</div>
