<aside class="w-2/12 bg-rojo py-10 px-5">
    {{-- Logo de la aplicacion --}}
    <a href="/" class="w-full"><img class="h-16 mb-5" src="{{ asset('img/logo-white.svg') }}"
            alt="Logotipo Enlace"></a>

    {{-- Lista de opciones --}}
    <nav class="flex flex-col space-y-2">
        {{-- Dashboard --}}
        <x-sidebar-link :href="route('admin.panel.index')" :active="request()->routeIs('admin.panel.index')">
            <x-slot:icon><i class="fa-solid fa-chart-line"></i></x-slot:icon>
            <x-slot:option>Resumen</x-slot:option>
        </x-sidebar-link>

        {{-- Usuarios --}}
        <x-sidebar-link :href="route('admin.panel.users')" :active="request()->routeIs('admin.panel.users')">
            <x-slot:icon><i class="fa-regular fa-user"></i></x-slot:icon>
            <x-slot:option>Usuarios</x-slot:option>
        </x-sidebar-link>

        {{-- Empresas --}}
        <x-sidebar-link :href="route('admin.panel.companies')" :active="request()->routeIs('admin.panel.companies')">
            <x-slot:icon><i class="fa-regular fa-building"></i></x-slot:icon>
            <x-slot:option>Empresas</x-slot:option>
        </x-sidebar-link>

    </nav>
</aside>
