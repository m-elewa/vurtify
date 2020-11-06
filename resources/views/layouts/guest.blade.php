<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        .h-100 {
            height: 100vh !important;
        }

        /* Floating label */
        .form-label-group {
          position: relative;
          margin-bottom: 1rem;
        }

        .form-label-group input,
        .form-label-group label {
          height: 3.125rem;
          padding: .75rem;
        }

        .form-label-group label {
          position: absolute;
          top: 0;
          left: 0;
          display: block;
          width: 100%;
          color: #495057;
          pointer-events: none;
          cursor: text; /* Match the input under the label */
          border: 1px solid transparent;
          border-radius: .25rem;
          transition: all .1s ease-in-out;
        }

        .form-label-group input::placeholder {
          color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
          padding-top: 1.25rem;
          padding-bottom: .25rem;
        }

        .form-label-group input:not(:placeholder-shown) ~ label {
          padding-top: .25rem;
          padding-bottom: .25rem;
          font-size: 12px;
          color: #777;
        }

        .form-label-group input:focus ~ label {
          padding-top: .25rem;
          padding-bottom: .25rem;
          font-size: 12px;
          color: #777;
        }

        .form-label-group input:focus {
          padding-top: 1.25rem;
          padding-bottom: .25rem;
        }
    </style>
</head>

<body class="h-100">
    <div class="h-100 d-flex flex-column" id="app">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> <!-- / Navbar -->

        <main class="py-4 mt-auto">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-layouts.footer />
    </div>

</html>
