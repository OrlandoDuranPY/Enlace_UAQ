<x-admin-panel-content>
    <div class="space-y-5">
        <h2 class="font-semibold text-xl lg:text-2xl uppercase">Usuarios</h2>

        <div>
            <x-primary-button wire:click="openModal">Crear usuario</x-primary-button>

            @if ($showModal)
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 flex items-center justify-center z-50 bg-black opacity-50">
                </div>

                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal-container bg-white w-2/5 mx-auto rounded shadow-lg z-50">
                        <!-- Contenido de la ventana modal -->
                        <div class="modal-content p-10">
                            <form class="w-full space-y-5" wire:submit.prevent='addUser' novalidate>
                                {{-- Rol --}}
                                <div class="w-full">
                                    <x-label for="rol">Tipo de usuario</x-label>
                                    <x-select wire:model.defer="rol" id="rol">
                                        <x-select-option value="">-- Selecciona una opción --</x-select-option>
                                        <x-select-option value="user">Usuario</x-select-option>
                                        @if (Auth::user()->rol == 'super_admin')
                                            <x-select-option value="admin">Administrador</x-select-option>
                                        @endif
                                    </x-select>
                                    <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                                </div>
                                {{-- Nombre --}}
                                <div class="w-full">
                                    <x-label for="name">Nombre</x-label>
                                    <x-text-input wire:model.defer="name" type="text" class="w-full" id="name"
                                        :placeholder="'Ingrese el nombre de usuario'" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                {{-- Correo --}}
                                <div class="w-full">
                                    <x-label for="email">Correo</x-label>
                                    <x-text-input wire:model.defer="email" type="email" class="w-full" id="email"
                                        :placeholder="'Ejemplo: Mi correo@gmail.com'" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                {{-- Password --}}
                                <div class="w-full">
                                    <x-label for="password">Contraseña</x-label>
                                    <x-text-input wire:model.defer="password" type="password" class="w-full"
                                        id="password" :placeholder="'Escriba la contraseña'" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                {{-- Password Confirm --}}
                                <div class="w-full">
                                    <x-label for="password_confirmation">Confirmar contraseña</x-label>
                                    <x-text-input wire:model.defer="password_confirmation" type="password"
                                        class="w-full" id="password_confirmation" :placeholder="'Repita la contraseña'" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <!-- Modal footer -->
                                <div class="flex gap-4">
                                    <x-primary-button data-modal-hide="defaultModal">Crear usuario</x-primary-button>
                                    <button type="button" wire:click="closeModal"
                                        class="font-semibold rounded-lg uppercase px-5 py-2 border">Cancelar</button>
                                </div>
                            </form>
                        </div>

                        <!-- Botón de cerrar modal -->
                        {{-- <div class="modal-footer p-4">
                            <button wire:click="closeModal" class="text-blue-500 hover:underline">Cerrar</button>
                        </div> --}}
                    </div>
                </div>
            @endif
        </div>


        {{-- Tabla de actividades --}}
        <div class="mt-10 space-y-5">
            <livewire:user-table />
        </div>
</x-admin-panel-content>
