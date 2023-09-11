<x-admin-panel-content>
    {{-- Grid de tarjetas --}}
    <div class="grid grid-cols-4 gap-10">
        {{-- Tarjeta para curriculums --}}
        <div class="shadow bg-white rounded-lg p-6 relative">
            <span class="text-gray-400 text-3xl"><i class="fa-solid fa-clipboard-user"></i></span>
            <h2 class="text-5xl font-black text-right">{{ $curricula->count() }}</h2>
            <p class="font-semibold text-gray-500 text-right text-lg">Total de curriculums</p>
        </div>

        {{-- Tarjeta para vacantes --}}
        <div class="shadow bg-white rounded-lg p-6 relative">
            <span class="text-gray-400 text-3xl"><i class="fa-solid fa-briefcase"></i></span>
            <h2 class="text-5xl font-black text-right">{{ $vacancies->count() }}</h2>
            <p class="font-semibold text-gray-500 text-right text-lg">Total de vacantes</p>
        </div>

        {{-- Tarjeta de usuarios --}}
        <div class="shadow bg-white rounded-lg p-6 relative">
            <span class="text-gray-400 text-3xl"><i class="fa-solid fa-users"></i></span>
            <h2 class="text-5xl font-black text-right">{{ $users->count() }}</h2>
            <p class="font-semibold text-gray-500 text-right text-lg">Total de usuarios</p>
        </div>

        {{-- Tarjeta de empresas --}}
        <div class="shadow bg-white rounded-lg p-6 relative">
            <span class="text-gray-400 text-3xl"><i class="fa-solid fa-building"></i></span>
            <h2 class="text-5xl font-black text-right">0</h2>
            <p class="font-semibold text-gray-500 text-right text-lg">Total de empresas</p>
        </div>
    </div>
</x-admin-panel-content>
