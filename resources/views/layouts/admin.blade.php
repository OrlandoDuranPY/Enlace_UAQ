<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body class="bg-white font-normal box-border ">
    {{-- Contenido --}}
    <div class="w-full h-screen flex">
        {{-- Barra lateral --}}
        <x-admin-panel-sidebar/>

        {{-- Contenido --}}
        <div class="w-10/12">
            @yield('contenido')
        </div>
    </div>

    @livewireScripts
</body>

</html>
