<aside class="w-2/12 bg-rojo p-5">
    {{-- Logo de la aplicacion --}}
    <a href="/" class="w-full"><img class="h-16 mb-5" src="{{ asset('img/logo-white.svg') }}"
            alt="Logotipo Enlace"></a>

    {{-- Lista de opciones --}}
    <nav class="flex flex-col space-y-2">
        {{-- Dashboard --}}
        <a href="{{ route('admin.panel.index') }}"
            class="w-full text-white font-semibold py-3 px-4 rounded-lg group hover:bg-white transition-all">
            <p class="group-hover:text-rojo text-lg"><span class="inline-block w-8 text-xl"><i
                        class="fa-solid fa-chart-line"></i></span>Dashboard</p>
        </a>
        {{-- Usuarios --}}
        <a href="#"
            class="w-full text-white font-semibold py-3 px-4 rounded-lg group hover:bg-white transition-all">
            <p class="group-hover:text-rojo text-lg"><span class="inline-block w-8 text-xl"><i
                        class="fa-regular fa-user"></i></span>Usuarios</p>
        </a>
        {{-- Empresas --}}
        <a href="#"
            class="w-full text-white font-semibold py-3 px-4 rounded-lg group hover:bg-white transition-all">
            <p class="group-hover:text-rojo text-lg"><span class="inline-block w-8 text-xl"><i
                        class="fa-regular fa-building"></i></span>Empresas</p>
        </a>
    </nav>
</aside>
