<div class="grid auto-rows-min gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($news as $item)
        <!-- Membungkus seluruh elemen dengan <a> untuk mengarahkan ke halaman detail -->
        <a href="{{ route('news.show', $item->slug) }}" class="
                hover:bg-zinc-200
                dark:hover:bg-zinc-800
                shadow-md hover:shadow-xl
                transform
                transition-all
                duration-300
                ease-in-out
                hover:scale-102
                relative aspect-[3/4] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 transform transition-all duration-300 ease-in-out">
            <!-- Bagian Atas: Gambar -->
            <div class="row-span-1">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image)}}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
            </div>
            <!-- Bagian Bawah: Tulisan -->
            <div class="row-span-1 p-4">
                @if ($item->categories->isNotEmpty())
                    @foreach ($item->categories as $category)
                        <button type="button" class="mr-1 px-3 py-1.5 sm:py-2 text-xs sm:text-xs font-medium text-center text-white bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-neutral-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-zinc-500!">
                            {{ $category->name }}
                        </button>
                    @endforeach
                @endif
                <h1 class="text-sm sm:text-lg md:text-xl font-bold mt-2">{{ $item->title }}</h1>
                <p class="text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}</p>
            </div>
        </a>
    @endforeach
</div>

