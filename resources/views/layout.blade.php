<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Laravel</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ route('index') }}">Test Laravel</a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-3">@yield('header-title')</h1>
                </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>
