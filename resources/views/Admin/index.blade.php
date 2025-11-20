<x-layouts.app :title="__('Admin Dashboard')">
    <div class="flex w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- Card Besar Welcome Admin --}}
        <div class="relative h-48 overflow-hidden rounded-2xl border border-neutral-200 bg-gradient-to-r from-blue-500 to-purple-600 p-8 text-white dark:border-neutral-700">
            <div class="relative z-10 h-full flex flex-col">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome, Admin!</h1>
                    <p class="text-blue-100 text-lg">Welcome to the administration panel. Manage content and monitor system activity easily.</p>
                </div>
                <div class="mt-auto">
                    <div class="flex items-center gap-2 text-sm">
                        <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        <span>Last login: {{ now()->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
            <div class="absolute right-6 top-1/2 transform -translate-y-1/2 opacity-20">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>

        {{-- 3 Card Kecil --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            {{-- Card 1: Total Pengguna --}}
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total User</p>
                        <p class="text-2xl font-bold text-neutral-900 dark:text-white mt-2">{{ $totalUser }}</p>
                    </div>
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Card 2: Total Artikel --}}
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Article</p>
                        <p class="text-2xl font-bold text-neutral-900 dark:text-white mt-2">{{ $news->count() }}</p>
                    </div>
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9m0 0v3m0-3a2 2 0 012-2h2a2 2 0 012 2m0 0V6a2 2 0 012-2h2a2 2 0 012 2v3m-6 0v3"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Card 3: Aktivitas Terbaru --}}
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Pending Article</p>
                        <p class="text-2xl font-bold text-neutral-900 dark:text-white mt-2">{{ $totalPending }}</p>
                    </div>
                    <div class="rounded-full bg-orange-100 p-3 dark:bg-orange-900">
                        <svg class="h-6 w-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <flux:heading class="text-xl">Pending Article</flux:heading>

        <div>
            <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
                @foreach ($news as $item)
                    @if ($item->status === 'pending')
                        <a href="{{ route('news.show', $item->slug) }}" class="shadow-md hover:shadow-xl hover:scale-102 relative aspect-[3/4] overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:shadow-lg transform transition-all duration-300 ease-in-out">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image)}}" alt="{{ $item->title }}" class="w-full h-1/2 object-cover">
                            @else
                                <div class="w-full h-1/2 bg-gray-300 flex items-center justify-center">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
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
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
