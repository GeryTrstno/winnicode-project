<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <livewire:sliding-news></livewire:sliding-news>

        <flux:spacer></flux:spacer>
        <div class="flex flex-row items-center justify-between">
            <flux:heading class="text-xl">Trending Now</flux:heading>
            <flux:link href="{{ route('news') }}" variant="subtle">See more</flux:link>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3 lg:grid-cols-2">
            @for ($i = 0; $i < 3; $i++)
                <div class="relative aspect-square overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 grid grid-rows-2">
                    <!-- Bagian Atas: Gambar -->
                    <div class="row-span-1">
                        <img src="images/poto-dummy.png" alt="Deskripsi Gambar" class="w-full h-full object-cover" />
                    </div>

                    <!-- Bagian Bawah: Tulisan -->
                    <div class="row-span-1 p-4">
                        <flux:button  size="xs">Technology</flux:button>
                        <h1 class="md:text-xl font-bold mt-3">New Smartphone Features Unveiled at Tech Conferences</h1>
                        <p class="text-zinc-300 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nunc ac nulla semper imperdiet eu quis dui. Aenean porta sapien pharetra sodales sed.</p>

                    </div>
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



