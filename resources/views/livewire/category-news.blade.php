<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex flex-row gap-2 flex-wrap">
        @for ($i = 0; $i < 6; $i++)
            <flux:button href="{{ route('categories') }}" variant="filled">Economy</flux:button>
        @endfor
    </div>

    <div class="grid auto-rows-min gap-5 md:grid-cols-2">
        @for ($i = 0; $i < 6; $i++)
            <div class="relative aspect-[18/6] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <div class="flex">
                    <div class="w-1/3 relative">
                        <img class="w-full h-full object-cover" src="images/poto-dummy.png" alt="">
                    </div>
                    <div class="w-2/3 p-4">
                        <flux:button size="xs">Technology</flux:button>
                        <h1 class="text-sm sm:text-lg md:text-xl font-bold mt-3">New Smartphone Features Unveiled at Tech Conferences</h1>
                        <p class="text-xs sm:text-xs md:text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nunc ac nulla semper imperdiet eu quis dui. Aenean porta sapien pharetra sodales sed.</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>


</div>

