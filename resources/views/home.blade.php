<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative aspect-[16/5] overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
        <flux:spacer></flux:spacer>
        <div class="flex flex-row items-center justify-between">
            <flux:heading class="text-xl">Trending Now</flux:heading>
            <flux:link href="{{ route('news') }}" variant="subtle">See more</flux:link>
        </div>



        <div class="grid auto-rows-min gap-4 grid-cols-3">
            @for ($i = 0; $i < 3; $i++)
                <div class="relative aspect-square overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
            @endfor
        </div>

        <flux:spacer></flux:spacer>

        <flux:separator></flux:separator>

        <flux:heading class="text-xl">Browse by Category</flux:heading>

        <div class="flex flex-row gap-2 flex-wrap">
            @for ($i = 0; $i < 6; $i++)
                <flux:button href="{{ route('categories') }}" variant="filled">Economy</flux:button>
            @endfor
        </div>

        <div class="grid auto-rows-min gap-5 md:grid-cols-2">
            @for ($i = 0; $i < 4; $i++)
                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
            @endfor
        </div>

        <flux:spacer></flux:spacer>

        <flux:separator></flux:separator>

        <flux:heading class="text-xl point-to-news">Latest News</flux:heading>

        <livewire:news-feed />
    </div>

</x-layouts.app>



