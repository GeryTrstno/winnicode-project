<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[#F5F5F5] dark:bg-zinc-800">
        @include('partials.navigation')

        {{ $slot }}

        @if (!request()->routeIs('user.show') && !request()->routeIs('news.create'))
            <livewire:footer></livewire:footer>
        @else
            @include('partials.secondary-footer')
        @endif

        @fluxScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.4/dist/flowbite.min.js"></script>

    </body>
</html>


