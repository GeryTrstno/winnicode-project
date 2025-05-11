<x-layouts.app.header :title="$title ?? null">
    <flux:main container>
        {{ $slot }}
    </flux:main>

    <x-layouts.app.footer></x-layouts.app.footer>

</x-layouts.app.header>

