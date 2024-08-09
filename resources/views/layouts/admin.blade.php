<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') . ' - ' . ($title ?? '') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Vite -->
        @vite(['resources/adminsass/admin.scss', 'resources/js/admin.js'])

    </head>
    <body>
        <div id="app">
            @include('admin.components.header')
            <div class="d-flex">
                @include('admin.components.sidebar')
                <main class="container-fluid p-4">
                @yield('content')
                </main>
            </div>
            @include('admin.components.footer')
        </div>
    </body>
</html>
