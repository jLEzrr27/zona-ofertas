<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('bootstrap4/bootstrap.min.css') }}" rel="stylesheet">

        <title>Zona de ofertas</title>

    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script src="{{ asset('bootstrap4/bootstrap.min.js') }}"></script>
        <script src="{{ asset('resources/axios.min.js') }}"></script>

        @yield('scripts')
    </body>
</html>
