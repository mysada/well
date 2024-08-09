<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="emerald">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') . ' - ' . ($title ?? '') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Vite -->

    </head>
    <body class="h-screen">
        <main class="flex flex-col h-screen">
            @include('admin.components.header')
            <div class="flex-1">
                @include('admin.components.sidebar')
                <div>
                    @yield('content')
                </div>
            </div>
            @include('admin.components.footer')
        </main>
    </body>
</html>
