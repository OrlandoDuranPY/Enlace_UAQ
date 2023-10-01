<div>
    <button wire:click="openModal" class="bg-blue-500 text-white px-4 py-2">Abrir Modal</button>

    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="modal-overlay"></div>

            <div class="modal-container bg-white w-96 mx-auto rounded shadow-lg z-50">
                <!-- Contenido de la ventana modal -->
                <div class="modal-content p-4">
                    <!-- Tu contenido aquí -->
                    <h2 class="text-lg font-semibold">Ventana Modal</h2>
                    <p>Este es el contenido de la ventana modal.</p>
                </div>

                <!-- Botón de cerrar modal -->
                <div class="modal-footer p-4">
                    <button wire:click="closeModal" class="text-blue-500 hover:underline">Cerrar</button>
                </div>
            </div>
        </div>
    @endif
</div>
