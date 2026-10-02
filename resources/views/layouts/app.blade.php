<!DOCTYPE html>
<html lang="{{ str_replace ('_', '-', app ()->getLocale ()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token () }}">
        {{-- *ues laravel --}}
        <title>{{ config ('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="{{ asset ('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset ('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @livewireStyles
    </head>

    <body class="font-sans antialiased">
        <div id="app">

        @include('layouts.navigation')
        
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Page Content -->
        <main>
            @livewireScripts
            {{ $slot }}
        </main>
        </div>
    </body>

</html>