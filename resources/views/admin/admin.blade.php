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
    <body class="h-screen">
        <div class="drawer lg:drawer-open">
            @include('admin.components.flash')
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
            <div class="drawer-content flex flex-col items-center justify-center">
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">
                    Open drawer
                </label>
                @include('admin.components.header')
                <main class="w-full p-4 flex-1">
                    @yield('content')
                </main>

                @include('admin.components.footer')
            </div>
            @include('admin.components.sidebar')
        </div>

    </body>
</html>
