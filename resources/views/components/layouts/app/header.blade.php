<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        @include('partials.navigation')

        {{ $slot }}

        @include('partials.footer')

        @fluxScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.4/dist/flowbite.min.js"></script>

    </body>
</html>
