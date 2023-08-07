<nav class="w-full bg-rojo absolute z-40">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        {{-- Logo Enlace --}}
        <a href="/" class=""><img src="{{ asset('img/logo-white.svg') }}" alt="Logo Enlace"></a>

        <div class="flex items-center md:order-2">
            @auth
                <!-- ========================================
                                Dropdown de Session
                            ======================================== -->
                <x-session-dropdown />
            @else
                <!-- ========================================
                               Enlace para iniciar sesion
                            ======================================== -->
                <div>
                    <a href="{{ route('login') }}" class="font-semibold text-white mr-2 md:mr-0"><i
                            class="fas fa-user"></i></a>
                </div>
            @endauth

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-white"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- ========================================
        Barra de Navegacion
        ======================================== -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex text-gray-700 md:text-white flex-col font-semibold p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                {{-- Enlace Curriculums --}}
                <li>
                    <a class="block py-2 pl-3 pr-4 rounded font-semibold uppercase md:p-0 hover:bg-rojo hover:bg-opacity-50 hover:text-white"
                        href="{{ route('curricula.index') }}">Curriculums</a>
                </li>
                {{-- Enlace Vacantes --}}
                <li>
                    <a class="block py-2 pl-3 pr-4 rounded font-semibold uppercase md:p-0 hover:bg-rojo hover:bg-opacity-50 hover:text-white"
                        href="#">Vacantes</a>
                </li>
                @auth
                    <!-- ========================================
                               Dropdown para agregar curriculums
                               y vacantes
                            ======================================== -->
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="text-gray-700 md:text-white uppercase font-semibold flex items-center justify-between w-full py-2 pl-3 pr-4 rounded hover:bg-rojo hover:bg-opacity-50 hover:text-white md:hover:bg-transparent md:border-0 md:p-0 md:w-auto">Registrar<svg
                                class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-48">
                            <ul class="py-2 text-sm text-gray-400" aria-labelledby="dropdownLargeButton">
                                {{-- Agregar Estudiante --}}
                                <li>
                                    <a href="{{ route('curricula.student.create') }}"
                                        class="block px-4 py-2 hover:bg-rojo hover:bg-opacity-50 hover:text-white font-semibold uppercase">Estudiante</a>
                                </li>
                                {{-- Agregar Docente --}}
                                <li>
                                    <a href="{{ route('curricula.teacher.create') }}"
                                        class="block px-4 py-2 hover:bg-rojo hover:bg-opacity-50 hover:text-white font-semibold uppercase">Docente</a>
                                </li>
                                {{-- Agregar Vacante --}}
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-rojo hover:bg-opacity-50 hover:text-white font-semibold uppercase">Vacante</a>
                                </li>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
