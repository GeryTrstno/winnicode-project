<div>
    <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
        @foreach ($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="hover:scale-102 relative aspect-[3/4] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:shadow-lg transform transition-all duration-300 ease-in-out">
                <img class="h-1/2" src="{{ asset('images/poto-dummy.png') }}" alt="">
                <div class="row-span-1 p-2 ml-2 mr-2">
                    @foreach ($item->categories as $category)
                        <button type="button" class="mt-2 mr-1 px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-zinc-500!">
                            {{ $category->name }}
                        </button>
                    @endforeach
                    <h1 class="text-sm sm:text-lg md:text-lg font-bold mt-3">{{ Str::limit($item->title, 35, '...') }}</h1>
                    <p class="absolute-0 text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">{{ Str::limit($item->content, 100, '...') }}</p>
                </div>
            </a>
        @endforeach
    </div>

    @if ($hasMorePages)
        <div class="flex flex-col justify-center items-center mt-4">
            <flux:button wire:click="loadMore" class="mt-2 text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-neutral-200!" wire:loading.attr="disabled" wire:target="loadMore">
                Load More
            </flux:button>
        </div>
    @endif
</div>
</div>
