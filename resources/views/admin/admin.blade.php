<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{($title ?? '')  . ' - ' . config('app.name', 'Laravel') }}</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/site.webmanifest">
        <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/images/favicon/favicon.ico">
        @vite(['resources/admin/style/app.css', 'resources/admin/js/admin.js'])

    </head>
    <body class="h-screen">
        <div class="drawer drawer-open">
            @include('admin.components.flash')
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" hidden/>
            <div class="drawer-content flex flex-col items-center justify-center">
                <label for="my-drawer-2" class="btn btn-primary drawer-button hidden">
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
