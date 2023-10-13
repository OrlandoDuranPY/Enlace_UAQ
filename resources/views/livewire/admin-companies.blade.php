<x-admin-panel-content>
    <div class="space-y-5">
        <x-secondary-title>Empresas</x-secondary-title>

        <div>
            @if ($showCompanyModal)
                <!-- Fondo oscuro -->
                <div class="fixed inset-0 flex items-center justify-center z-50 bg-black opacity-50">
                </div>

                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="modal-container bg-white w-2/5 mx-auto rounded shadow-lg z-50">
                        <!-- Contenido de la ventana modal -->
                        <div class="modal-content p-10">
                            <form class="w-full space-y-5" wire:submit.prevent='addCompany' novalidate>
                                {{-- Nombre --}}
                                <div class="w-full">
                                    <x-label for="name">Nombre</x-label>
                                    <x-text-input wire:model.defer="name" type="text" class="w-full" id="name"
                                        :placeholder="'Ingrese el nombre de la empresa'" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <!-- Modal footer -->
                                <div class="flex gap-4">
                                    <x-primary-button data-modal-hide="defaultModal">Crear empresa</x-primary-button>
                                    <button type="button" wire:click="closeCompanyModal"
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
                            placeholder="Buscar empresa...">
                            <select wire:model='showRows' class="h-10 col-span-1 mb-5 rounded-lg text-sm border border-gray-300 focus:ring-1 focus:ring-verde focus:border-verde">
                                <option value="10">10 filas</option>
                                <option value="20">25 filas</option>
                                <option value="50">50 filas</option>
                                <option value="100">100 filas</option>
                            </select>
                            <x-primary-button class="h-10 col-span-1" wire:click="showCompanyModal">Crear empresa</x-primary-button>
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
                                Usuarios
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                </x-slot:thead>
                <x-slot:tbody>
                    @forelse ($companies as $company)
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $company->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $company->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $company->num_curriculums }}
                                </td>

                                <td class="px-6 space-x-4">
                                    <button wire:click="" class="px-4 py-2 bg-verde text-white font-semibold rounded-lg" type="button"><i class="fa-solid fa-square-plus"></i></button>
                                    <button wire:click="" class="px-4 py-2 bg-blue-300 text-white font-semibold rounded-lg" type="button"><i class="fa-solid fa-user"></i></button>
                                    <button wire:click="$emit('deleteCompanyJS', {{ $company->id }})" class="px-4 py-2 bg-rojo text-white font-semibold rounded-lg" type="button"><i class="fa-solid fa-trash-can"></i></button>
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
                    {{ $companies->links() }}
                </x-slot:links>
            </x-data-table>
        </div>
    </div>
</x-admin-panel-content>
