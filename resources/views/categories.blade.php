<x-layouts.app :title="__('Categories')">
    <flux:heading class="mb-3" size="xl">{{ $category->name }}</flux:heading>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-row gap-2 flex-wrap">
            @foreach ($subcategories as $subcategory)
                <flux:button size="sm" :href="route('home')" class="mt-2 mr-1 px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-zinc-500!" variant="filled">
                    {{ $subcategory->name }}
                </flux:button>
            @endforeach
        </div>
        <flux:separator class="mt-4 mb-4"></flux:separator>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                @if($news->count())
                    @php $firstNews = $news->first(); @endphp
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        <img src="{{ $firstNews->image ?? '' }}" alt="" class="absolute inset-0 size-full object-cover" />
                    </div>
                    <div class="relative mt-4">
                        <h2 class="text-3xl font-bold">{{ $firstNews->title }}</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $firstNews->excerpt }}</p>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-1 gap-4">
                @foreach ($news->skip(1)->take(3) as $item)
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        <img src="{{ $item->image ?? '' }}" alt="" class="absolute inset-0 size-full object-cover" />
                    </div>
                @endforeach
            </div>
        </div>
        <flux:separator class="mb-4 mt-4"></flux:separator>

        <livewire:news-feed :categoryId="$category->id" />
    </div>
</x-layouts.app>
