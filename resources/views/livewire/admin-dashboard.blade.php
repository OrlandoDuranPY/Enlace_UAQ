<x-admin-panel-content>
    <div class="space-y-5">
        <x-secondary-title>Resumen</x-secondary-title>
        {{-- Grid de tarjetas --}}
        <div class="grid grid-cols-4 gap-10">
            {{-- Tarjeta para curriculums --}}
            <div class="shadow bg-white rounded-lg p-6 relative">
                <span class="text-verde text-3xl"><i class="fa-solid fa-clipboard-user"></i></span>
                <h2 class="text-5xl font-black text-right">{{ $curricula->count() }}</h2>
                <p class="font-semibold text-gray-500 text-right text-lg">Total de curriculums</p>
            </div>

            {{-- Tarjeta para vacantes --}}
            <div class="shadow bg-white rounded-lg p-6 relative">
                <span class="text-verde text-3xl"><i class="fa-solid fa-briefcase"></i></span>
                <h2 class="text-5xl font-black text-right">{{ $vacancies->count() }}</h2>
                <p class="font-semibold text-gray-500 text-right text-lg">Total de vacantes</p>
            </div>

            {{-- Tarjeta de usuarios --}}
            <div class="shadow bg-white rounded-lg p-6 relative">
                <span class="text-verde text-3xl"><i class="fa-solid fa-users"></i></span>
                <h2 class="text-5xl font-black text-right">{{ $users->count() }}</h2>
                <p class="font-semibold text-gray-500 text-right text-lg">Total de usuarios</p>
            </div>

            {{-- Tarjeta de empresas --}}
            <div class="shadow bg-white rounded-lg p-6 relative">
                <span class="text-verde text-3xl"><i class="fa-solid fa-building"></i></span>
                <h2 class="text-5xl font-black text-right">0</h2>
                <p class="font-semibold text-gray-500 text-right text-lg">Total de empresas</p>
            </div>
        </div>
    </div>

    {{-- Tabla de actividades --}}
    <div class="mt-10 space-y-5">
        <x-secondary-title>Registro de actividades</x-secondary-title>
        <x-data-table>
            <x-slot:search>
                <input type="text" wire:model="search"
                    class="mb-5 rounded-lg text-sm border border-gray-300 focus:ring-1 focus:ring-verde focus:border-verde w-80"
                    placeholder="Buscar por acción o usuario...">
            </x-slot:search>
            <x-slot:thead>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actualizado
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th> --}}
                    </tr>
                </thead>
            </x-slot:thead>
            <x-slot:tbody>
                @forelse ($activities as $activity)
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $activity->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $activity->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $activity->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $activity->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $activity->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <!-- Mensaje de no hay actividades por mostrar -->
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No hay actividades por mostrar.
                            </td>
                        </tr>
                    </tbody>
                @endforelse

            </x-slot:tbody>
            <x-slot:links class="mt-4 bg-red-500">
                {{-- {{ $activities->links() }} --}}
            </x-slot:links>
        </x-data-table>
    </div>
</x-admin-panel-content>
