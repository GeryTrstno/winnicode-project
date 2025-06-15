<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex flex-row gap-2 flex-wrap">
        @for ($i = 0; $i < 6; $i++)
            <button type="button" class="px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:bg-zinc-600 dark:hover:bg-zinc-700 dark:focus:ring-zinc-800">Technology</button>
        @endfor
    </div>

    <div class="grid auto-rows-min gap-5 md:grid-cols-2">
        @for ($i = 0; $i < 6; $i++)
            <div class="relative aspect-[18/6] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <div class="flex h-full">
                    <div class=" w-1/3 relative">
                        <img class="h-full w-full object-cover" src="images/conference.jpg" alt="">
                    </div>
                    <div class="w-2/3 p-4">
                        <h1 class="text-sm sm:text-lg md:text-xl font-bold">New Smartphone Features Unveiled at Tech Conferences</h1>
                        <p class="text-xs sm:text-xs md:text-sm">
                            <span class="block md:hidden">Lorem ipsum dolor sit amet...</span>
                            <span class="hidden md:block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nunc ac nulla semper imperdiet eu quis dui. Aenean porta sapien pharetra sodales sed.</span>
                        </p>
                    </div>
                </div>
            </div>

        @endfor
    </div>
</div>

