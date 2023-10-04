<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Enlace | Buscador</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

    @livewireStyles
</head>

<body class="h-screen relative">
    <x-responsive-navbar/>
    {{-- <x-navbar/> --}}

    <!-- ========================================
       Contenido
    ======================================== -->
    <div class="h-screen lg:w-6/12 mx-auto flex items-center justify-center flex-col">
        <img src="{{ asset('img/logo-color.svg') }}" class="mb-10 h-28" alt="Logo Enlace">
        <!-- ========================================
           Formulario de buscador
        ======================================== -->
            <livewire:home-searchbar>
    </div>

    @livewireScripts
</body>

</html>
