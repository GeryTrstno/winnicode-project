<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl"  wire:poll.5s>
    <div class="flex flex-row gap-2 flex-wrap">
        @foreach ($categories as $category)
            <button
                wire:click="selectCategory({{ $category->id }})"
                type="button"
                class="px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center rounded-lg focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:focus:ring-zinc-500"
                :class="{
                    // Light theme classes
                    'bg-zinc-900 text-white hover:bg-zinc-700': {{ $category->id }} !== {{ $selectedCategoryId }},
                    'bg-zinc-700 text-white': {{ $category->id }} === {{ $selectedCategoryId }},

                    // Dark theme classes
                    'dark:bg-zinc-100 dark:text-black dark:hover:bg-zinc-300': {{ $category->id }} !== {{ $selectedCategoryId }},
                    'dark:bg-zinc-300 dark:text-black dark:hover:bg-zinc-300': {{ $category->id }} === {{ $selectedCategoryId }}
                }">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if($this->selectedNews && $this->selectedNews->count() > 0)
            @foreach ($this->selectedNews as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl shadow-md hover:shadow-xl overflow-hidden hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:scale-102 transition-all duration-300 ease-in-out">
                    @if($news->image)
                        <img src="{{ asset('storage/' . $news->image)}}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">
                            {{ $news->title }}
                        </h3>

                        <p class="text-xs sm:text-xs md:text-sm mb-3 text-zinc-800 dark:text-zinc-300">
                            {{ $news->excerpt ?? Str::limit(strip_tags($news->content), 120) }}
                        </p>

                        <div class="flex justify-between items-center text-xs font-bold text-zinc-900 dark:text-zinc-100">
                            <span>{{ $news->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </a>

            @endforeach
        @else
            <p class="text-center text-gray-500">No news available for this category.</p>
        @endif
    </div>
</div>
