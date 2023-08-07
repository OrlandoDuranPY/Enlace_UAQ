<!-- ========================================
    Dropdown de Perfil y cerrar sesion
======================================== -->

<button id="dropdownSessionButton" data-dropdown-toggle="dropdownSession"
    class="text-white text-sm font-semibold inline-flex items-center gap-2 p-3 uppercase"
    type="button">{{ Auth::user()->name }}
    <i class="fas fa-angle-down"></i> </button>

<!-- Dropdown menu -->
<div id="dropdownSession" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52">
    <div class="px-4 py-3 text-sm font-semibold text-gray-700 text-left">
        <div class="text-base">{{ Auth::user()->name }}</div>
        <div class="truncate text-gray-700">{{ Auth::user()->email }}</div>
    </div>
    <ul class="py-2 text-sm text-gray-400 text-left" aria-labelledby="dropdownSessionButton">
        @if (Auth::user()->rol == 1)
            <li>
                <a href="{{ route('panel.dashboard') }}"
                    class="block px-4 py-2 hover:bg-rojo hover:bg-opacity-50 hover:text-white font-semibold">Panel
                    de administrador</a>
            </li>
        @endif

        <li>
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 hover:bg-rojo hover:bg-opacity-50 hover:text-white font-semibold">Actualizar
                perfil</a>
        </li>
    </ul>
    <div class="py-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link class="text-sm" :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Cerrar sesión') }}
            </x-dropdown-link>
        </form>

    </div>
</div>
