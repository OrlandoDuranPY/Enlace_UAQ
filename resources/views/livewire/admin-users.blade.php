<x-admin-panel-content>
    <div class="space-y-5">
        <div class="flex gap-5 items-center">
            <h2 class="font-semibold text-xl lg:text-2xl uppercase">Usuarios</h2>
            {{-- Ventana Modal --}}
            <form class="w-full p-5 space-y-3" wire:submit.prevent='addUser' novalidate>
                {{-- Tipo de usuario --}}
                <div class="w-full">
                    <x-label for="rol">Tipo de usuario</x-label>
                    <x-select wire:model.defer="rol" id="rol">
                        <x-select-option value="user">Usuario</x-select-option>
                        <x-select-option value="admin">Administrador</x-select-option>
                    </x-select>
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
                    <x-text-input wire:model.defer="password" type="password" class="w-full" id="password"
                        :placeholder="'Escriba la contraseña'" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                {{-- Password Confirm --}}
                <div class="w-full">
                    <x-label for="password_confirmation">Confirmar contraseña</x-label>
                    <x-text-input wire:model.defer="password_confirmation" type="password" class="w-full"
                        id="password_confirmation" :placeholder="'Repita la contraseña'" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center pt-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <x-primary-button type="submit">Agregar</x-primary-button>
                    <x-primary-button type="button"
                        class="bg-white border border-gray-200 font-semibold text-gray-950">Cancelar</x-primary-button>
                </div>
            </form>
            {{-- <x-modal-form>
                <x-slot:modal-name>Agregar usuario</x-slot:modal-name>
                <x-slot:modal-body>

                </x-slot:modal-body>
            </x-modal-form> --}}
        </div>

        {{-- Tabla de actividades --}}
        <div class="mt-10 space-y-5">
            <livewire:user-table />
        </div>
</x-admin-panel-content>
