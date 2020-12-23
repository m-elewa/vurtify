<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app/styles.css') }}">
</head>

<body class="position-relative">
    {{-- Toasts --}}
    <x-layouts.app.toasts />

    <div class="h-100 d-flex flex-column" id="app">
        <!-- Navbar -->
        <x-app.header />

        <main>
            <x-layouts.session-alerts />
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-layouts.app.footer />
    </div>

    <!-- Scripts -->
    <script src="{{ mix('app/scripts.js') }}"></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
</html>
