<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('guest/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('guest/scripts.js') }}"></script>
</head>

<body>
    <div class="h-100 d-flex flex-column" id="app">

        <!-- Navbar -->
        <x-layouts.guest.header />
        <x-layouts.session-alerts />

        <main class="py-4 mt-auto">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-layouts.guest.footer />
    </div>
</html>
