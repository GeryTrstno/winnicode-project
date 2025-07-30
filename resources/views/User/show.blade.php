<x-layouts.app :title="__('Profile - :name', ['name' => $user->name])">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <livewire:display-profile :user="$user" :isFollowing="$isFollowing" :showEditProfileButton="true" />

        <flux:separator></flux:separator>

        @if ($user->news->count() > 0)
            <livewire:news-index :userId="$user->id" />
        @else
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
