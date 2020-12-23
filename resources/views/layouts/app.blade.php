<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Scheherazade:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('mystyles')
        @yield('styles')
        @livewireStyles

        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/c4b1104435.js" crossorigin="anonymous"></script>
        @stack('myscripts')
        @yield('scripts')
    </head>
    <body class="font-sans antialiased flex overflow-y-auto">
        <div class="bg-transparent fixed z-20">
            @livewire('sidebar')
            @livewire('sidebar-toggle')
        </div>

        {{ $slot }}




        @stack('modals')

        @livewireScripts

        @stack('bottomscripts')
    </body>
</html>
