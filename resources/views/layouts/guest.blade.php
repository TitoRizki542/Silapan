<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        h2.swal2-title {
            font-weight: normal;
        }

        .swal2-timer-progress-bar {
            background-color: rgba(25, 135, 84, 0.8);
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS 5.3 -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
</head>

<body>
    @include('sweetalert::alert')

    <main>
        <div class="row p-3 mx-0 min-vh-100">
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center h-100 py-5">
                    {{ $slot }}
                </div>
            </div>
            <div class="col-md-6 rounded-4 d-none d-md-block"
                style="background-image: url({{ URL::asset('assets/img/banner2.jpg') }}); background-size: cover; background-repeat: no-repeat">
            </div>
        </div>
    </main>

    <!-- Boostrap JS 5.3 -->
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
