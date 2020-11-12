<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('app/scripts.js') }}"></script>
</head>

<body>
    <div class="h-100 d-flex flex-column" id="app">

        <!-- Navbar -->
        <x-layouts.app.header />

        <main>
            @if(session('status-success'))
                <div class="container py-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status-success') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session('status-fail'))
                <div class="container py-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('status-fail') }}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-layouts.app.footer />
    </div>

</html>
