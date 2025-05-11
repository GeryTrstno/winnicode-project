<x-layouts.app.header :title="$title ?? null">
    <flux:main container>
        {{ $slot }}
    </flux:main>
    @include('partials.footer')

</x-layouts.app.header>

