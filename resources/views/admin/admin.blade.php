<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') . ' - ' . ($title ?? '') }}</title>
        <!-- Vite -->
        @vite(['resources/admin/style/app.css', 'resources/admin/js/admin.js'])

    </head>
    <body class="h-screen flex">
        @include('admin.components.sidebar')
        <main class="flex-1 ml-32 w-full">
            @include('admin.components.header')
            <div class="p-4">
                @yield('content')
            </div>
            @include('admin.components.footer')
        </main>
    </body>
</html>
