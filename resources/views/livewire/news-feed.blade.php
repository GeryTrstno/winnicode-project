<div>
    <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
        @for ($i = 0; $i < $itemcount; $i++)
            <div class="relative aspect-[3/4] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <img class="h-1/2" src="images/poto-dummy.png" alt="">
                <div class="row-span-1 p-2">
                    <flux:button size="xs">Technology</flux:button>
                    <h1 class="text-sm sm:text-lg md:text-lg font-bold mt-3">New Smartphone Features Unveiled at Tech Conferences</h1>
                    <p class=" text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nunc ac nulla semper imperdiet eu quis dui.</p>


                </div>

            </div>
        @endfor
    </div>

    @if ($hasMorePages)
        <div class="flex flex-col justify-center items-center mt-4">
            <flux:button wire:click="loadMore" wire:loading.attr="disabled" wire:target="loadMore">
                Load More
            </flux:button>
        </div>
    @endif
</div>
