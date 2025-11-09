<x-layouts.app :title="__('Admin Dashboard')">
    <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
        @if($news->count() > 0)
            @foreach ($news as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="shadow-md hover:shadow-xl hover:scale-102 relative aspect-[3/4] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:shadow-lg transform transition-all duration-300 ease-in-out">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image)}}" alt="{{ $item->title }}" class="w-full h-1/2 object-cover">
                    @else
                        <div class="w-full h-1/2 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    {{-- <!-- Icon Titik Tiga untuk Aksi -->
                    <div class="absolute top-2 right-2">
                        <button class="text-black hover:text-gray-400">
                            <!-- Icon Titik Tiga -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h12M6 6h12M6 18h12"></path>
                            </svg>
                        </button>
                    </div> --}}

                    <div class="row-span-1 p-2 ml-2 mr-2">
                        @foreach ($item->categories as $category)
                            <button type="button" class="mt-2 mr-1 px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-zinc-500!">
                                {{ $category->name }}
                            </button>
                        @endforeach
                        <h1 class="text-sm sm:text-lg md:text-lg font-bold mt-3">{{ Str::limit($item->title, 35, '...') }}</h1>
                        <p class="absolute-0 text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 90) }}</p>
                    </div>
                </a>
            @endforeach
        @else
            <div class="col-span-4 text-center p-4">
                <p class="text-zinc-300">No news articles available.</p>
            </div>
        @endif
    </div>
</x-layouts.app>
