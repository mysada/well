<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{($title ?? '') . ' - ' . config('app.name', 'Laravel') }}</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/site.webmanifest">
        <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/images/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Vite -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <div id="app">
            @include('well.components.header')

            <main class="py-4">
                @include('well.components.flash')
                @yield('content')

            </main>

            @include('well.components.footer')
        </div>
    </body>
</html>
