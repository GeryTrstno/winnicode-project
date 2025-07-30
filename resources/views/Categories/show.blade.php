<x-layouts.app :title="'Categories - ' . $category->name">
    <flux:heading class="mb-3" size="xl">{{ $category->name }}</flux:heading>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-row gap-2 flex-wrap">
            @foreach ($subcategories as $subcategory)
                <flux:button size="sm" :href="route('subcategory.show', [$category->slug, $subcategory->slug])" class="mt-2 mr-1 px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-zinc-500!" variant="filled">
                    {{ $subcategory->name }}
                </flux:button>
            @endforeach
        </div>
        <flux:separator class="mt-4 mb-4"></flux:separator>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                @if($news->count())
                    @php
                        $seed = crc32($category->id); // seed tetap per kategori
                        srand($seed);
                        $index = rand(0, $news->count() - 1);
                        $randomNews = $news[$index];

                    @endphp
                    <a href="{{ route('news.show', $randomNews->slug) }}">
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        @if ($randomNews->image)
                            <img
                                src="{{ asset('storage/' . $randomNews->image) }}"
                                alt="{{ $randomNews->title }}"
                                class="absolute inset-0 size-full object-cover"
                            />
                        @else
                            <div class="absolute inset-0 size-full bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                    </div>
                    </a>
                    <div class="relative mt-4">
                        <h2 class="text-4xl font-bold">{{ $randomNews->title }}</h2>
                        <p class="mt-3 text-zinc-600 dark:text-zinc-400 text-lg">{{ $randomNews->caption }}</p>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-1 gap-4">
                @foreach ($news->skip(1)->take(3) as $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                         @if ($item->image)
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="absolute inset-0 size-full object-cover"
                            />
                        @else
                            <div class="absolute inset-0 size-full bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        </a>
                @endforeach
            </div>
        </div>
        <flux:separator class="mb-4 mt-4"></flux:separator>

        <livewire:news-index :categoryId="$category->id" />
    </div>
</x-layouts.app>
