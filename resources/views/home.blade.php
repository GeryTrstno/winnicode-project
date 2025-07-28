<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <livewire:sliding-news></livewire:sliding-news>

        <flux:spacer></flux:spacer>
        <div class="flex flex-row items-center justify-between">
            <flux:heading class="text-xl">Trending Now</flux:heading>
            {{-- <flux:link href="{{ route('news') }}" variant="subtle">See more</flux:link> --}}
        </div>

        <livewire:trending-news></livewire:trending-news>

        <flux:spacer></flux:spacer>

        <flux:separator></flux:separator>

        <flux:heading class="text-xl">Browse by Category</flux:heading>

        <livewire:category-news />

        <flux:spacer></flux:spacer>

        <flux:separator></flux:separator>

        <flux:heading class="text-xl point-to-news">Latest News</flux:heading>

        <livewire:news-index />

        <a href="{{ route('news.create') }}">Create</a>

    </div>
</x-layouts.app>
