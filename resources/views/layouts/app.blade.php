<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />


    <!-- Bootstrap CSS 5.3 -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/silapan.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">

    @stack('css')
</head>

<body>
    @include('sweetalert::alert')

    <header>
        @include('layouts.navigation')
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-success text-white">
        <div class="container py-5">
            <p class="text-center mb-0">
                &copy; Copyright 2024 Payaman App. Made with <i class="fa-sharp fa-solid fa-heart text-danger"></i> by
                Tegar
            </p>
        </div>
    </footer>

    <!-- Boostrap JS 5.3 -->
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Boostrap Custom --}}
    @stack('js')
</body>

</html>
