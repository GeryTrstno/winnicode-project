<x-layouts.app :title="'Sub Categories - ' . $subcategory->name">
    <flux:heading class="mb-3" size="xl">{{ $subcategory->name }}</flux:heading>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                @if($news->count())
                    @php
                        $seed = crc32($category->id); // seed tetap per kategori
                        srand($seed);
                        $index = rand(0, $news->count() - 1);
                        $randomNews = $news[$index];
                    @endphp
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        <img
                            src="{{ asset('images/news3.jpeg')}}"
                            alt=""
                            class="absolute inset-0 size-full object-cover"
                        />
                    </div>
                    <div class="relative mt-4">
                        <h2 class="text-4xl font-bold">{{ $randomNews->title }}</h2>
                        <p class="mt-3 text-zinc-600 dark:text-zinc-400 text-lg">{{ $randomNews->content }}</p>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-1 gap-4">
                @foreach ($news->skip(1)->take(3) as $item)
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        <img
                            src="{{ asset('images/news3.jpeg')}}"
                            alt=""
                            class="absolute inset-0 size-full object-cover"
                        />
                    </div>
                @endforeach
            </div>
        </div> --}}
        <flux:separator class="mb-4 mt-4"></flux:separator>

        <livewire:news-index :subcategoryId="$subcategory->id" />
    </div>
</x-layouts.app>
