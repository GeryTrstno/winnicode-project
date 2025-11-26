<x-layouts.app :title="__('Profile - :name', ['name' => $user->name])">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <livewire:display-profile :user="$user" :isFollowing="$isFollowing" :showEditProfileButton="true" />

        <flux:separator></flux:separator>

        @if ($user->news->count() > 0)
            <div>
                <div class="grid grid-cols-2 auto-rows-min gap-5 md:grid-cols-4">
                    @foreach ($news as $item)
                        @if ($user->name !== auth()->user()->name)
                            @if ($item->status === 'published')
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
                                        <p class="absolute-0 text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 30) }}</p>
                                    </div>
                                </a>
                            @endif
                        @else
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
                                        <p class="absolute-0 text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 30) }}</p>
                                    </div>

                                    <div>
                                        <div class="absolute bottom-2 left-2">
                                            @switch($item->status ?? null)
                                                @case('published')
                                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200">Published</span>
                                                    @break
                                                @case('rejected')
                                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Rejected</span>
                                                    @break
                                                @case('pending')
                                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-zinc-300 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-200">Pending</span>
                                                    @break
                                                @default
                                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">{{ ucfirst($item->status ?? 'Unknown') }}</span>
                                            @endswitch
                                        </div>
                                    </div>
                                </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @elseif (auth()->user() && auth()->user()->id === $user->id)
            <div class="flex flex-col items-center justify-center py-16 text-center text-gray-500">
                <a href="{{ route('news.create')}}"
                    aria-label="Tambah News">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-300 dark:hover:text-white">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 8v8m4-4H8" />
                    </svg>
                </a>
                <span class="mt-2">Add New Post</span>
            </div>
        @endif
    </div>
</x-layouts.app>
