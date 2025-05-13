<div>
    <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
        @for ($i = 0; $i < $itemcount; $i++)
            <div class="relative aspect-[3/4] overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
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
