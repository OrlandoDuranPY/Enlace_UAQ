<x-admin-panel-content>
    <div class="space-y-5">
        <h2 class="font-semibold text-xl lg:text-2xl uppercase">Usuarios</h2>

        <div>
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


        {{-- Tabla de usuarios --}}
        <div class="mt-10 space-y-5">
            <x-data-table>
                <x-slot:search>
                        <div class="grid lg:grid-cols-6 gap-10">
                            <input type="text" wire:model="search"
                            class="mb-5 rounded-lg text-sm border border-gray-300 focus:ring-1 focus:ring-verde focus:border-verde col-span-4"
                            placeholder="Buscar por acción o usuario...">
                            <select wire:model='showRows' class="h-10 col-span-1 mb-5 rounded-lg text-sm border border-gray-300 focus:ring-1 focus:ring-verde focus:border-verde">
                                <option value="10">10 filas</option>
                                <option value="20">25 filas</option>
                                <option value="50">50 filas</option>
                                <option value="100">100 filas</option>
                            </select>
                            <x-primary-button class="h-10 col-span-1" wire:click="openModal">Crear usuario</x-primary-button>
                        </div>

                </x-slot:search>


                <x-slot:thead>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Correo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rol
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th> --}}
                        </tr>
                    </thead>
                </x-slot:thead>
                <x-slot:tbody>
                    @forelse ($users as $user)
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->rol }}
                                </td>
                                <td class="px-6">
                                    @if (Auth::user()->id !== $user->id)
                                    <button wire:click="$emit('deleteUserJS', {{ $user->id }})" class="px-4 py-2 bg-rojo text-white font-semibold rounded-lg" type="button"><i class="fa-solid fa-trash-can"></i></button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <!-- Mensaje de no hay actividades por mostrar -->
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    No hay actividades por mostrar.
                                </td>
                            </tr>
                        </tbody>
                    @endforelse

                </x-slot:tbody>
                <x-slot:links class="mt-4 bg-red-500">
                    {{ $users->links() }}
                </x-slot:links>
            </x-data-table>
        </div>
</x-admin-panel-content>
