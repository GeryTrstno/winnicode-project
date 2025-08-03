<div class="flex flex-col w-full gap-6 mx-auto bg-white dark:bg-zinc-900 rounded-xl p-6 mb-2">
    @if($editMode)
        <!-- MODE EDIT PROFILE -->
        <form wire:submit.prevent="save" action="">
            <!-- Cover Image Section -->
            <div class="relative aspect-5/1 overflow-hidden rounded-lg bg-gray-200 dark:bg-gray-700">
                @if($coverImage && is_object($coverImage))
                    <!-- Preview gambar cover baru -->
                    <img src="{{ $coverImage->temporaryUrl() }}" alt="Cover Preview" class="w-full h-full object-cover">
                @elseif($user->profile->cover_image == 'cover.jpg')
                    <!-- Gambar cover yang sudah ada -->
                    <img src="{{ asset('images/' . $user->profile->cover_image)}}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                @else
                    <!-- Placeholder jika tidak ada gambar -->
                    <div class="object-cover w-full h-full bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-500">No Cover Image</span>
                    </div>
                @endif

                <!-- Overlay untuk upload cover image -->
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-50 transition-opacity duration-300">
                    <label for="coverImageInput" class="cursor-pointer bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-3 text-black hover:bg-opacity-30 transition-all">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera-icon lucide-camera text-black"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                        </div>
                        <span class="text-sm font-medium">Change Cover</span>
                    </label>
                    <input
                        type="file"
                        id="coverImageInput"
                        wire:model="coverImage"
                        accept="image/*"
                        class="hidden"
                    >
                </div>
            </div>
            @error('coverImage') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror

            <div class="flex flex-col sm:flex-row items-start gap-6 px-4 mt-6">
                <!-- Profile Image Section -->
                <div class="flex-shrink-0 -mt-16 relative group">
                    @if($profileImage && is_object($profileImage))
                        <!-- Preview gambar profil baru -->
                        <img src="{{ $profileImage->temporaryUrl() }}" alt="Profile Preview" class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg">
                    @elseif($user->profile->image == 'Default_pfp.jpg')
                        <!-- Gambar profil yang sudah ada -->
                        <img src="{{ asset('images/' . $user->profile->image) }}" alt="{{ $user->name }}" class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg">
                    @else
                        <!-- Avatar default -->
                        <div class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 bg-gray-300 flex items-center justify-center shadow-lg">
                            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    @endif

                    <!-- Overlay untuk upload profile image -->
                    <div class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                        <label for="profileImageInput" class="cursor-pointer bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-3 text-white hover:bg-opacity-30 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera-icon lucide-camera text-black"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                        </label>
                        <input
                            type="file"
                            id="profileImageInput"
                            wire:model="profileImage"
                            accept="image/*"
                            class="hidden"
                        >
                    </div>
                    @error('profileImage') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex-grow space-y-6 w-full">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700 dark:text-gray-200">Nama</label>
                            <flux:input
                                label=""
                                type="text"
                                wire:model="name"
                            />
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700 dark:text-gray-200">Username</label>
                            <flux:input
                                label=""
                                type="text"
                                wire:model="username"
                            />
                            @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div>
                            <span class="font-bold">{{ $followersCount }}</span>
                            <span class="text-gray-500">Followers</span>
                        </div>
                        <div>
                            <span class="font-bold">{{ $followingCount }}</span>
                            <span class="text-gray-500">Following</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-700 dark:text-gray-200">Bio</label>
                        <flux:input
                            label=""
                            type="textarea"
                            wire:model="bio"
                            rows="3"
                        />
                        @error('bio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Loading indicators -->
                    <div wire:loading wire:target="profileImage" class="text-sm text-blue-600 dark:text-blue-400">
                        Uploading profile image...
                    </div>
                    <div wire:loading wire:target="coverImage" class="text-sm text-blue-600 dark:text-blue-400">
                        Uploading cover image...
                    </div>

                    <div class="flex gap-3 mt-4">
                        <button type="submit" class="px-6 py-2 font-semibold
                            text-white
                            bg-zinc-900 rounded-lg
                            hover:bg-zinc-700 focus:ring-2 focus:outline-none
                            focus:ring-zinc-300
                            dark:text-zinc-900
                            dark:bg-white
                            dark:hover:bg-zinc-300
                            dark:focus:ring-neutral-200
                            transition
                            disabled:opacity-50
                            "
                            wire:loading.attr="disabled"
                            wire:target="save">
                            <span wire:loading.remove wire:target="save">Simpan</span>
                            <span wire:loading wire:target="save">Menyimpan...</span>
                        </button>
                        <button type="button" wire:click="cancelEdit" class="px-6 py-2 font-semibold
                            bg-zinc-200 text-zinc-900
                            hover:bg-zinc-300
                            focus:ring-2 focus:outline-none focus:ring-neutral-200
                            dark:bg-zinc-700 dark:text-white
                            dark:hover:bg-zinc-800 dark:focus:ring-zinc-300
                            rounded-lg transition">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <!-- MODE DISPLAY PROFILE -->
        <div class="relative aspect-5/1 overflow-hidden rounded-lg bg-gray-200 dark:bg-gray-700">
            @if($user->profile->cover_image != 'cover.jpg')
                <img src="{{ asset('storage/' . $user->profile->cover_image)}}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('images/' . $user->profile->cover_image) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="flex flex-col sm:flex-row items-start gap-6 px-4">
            <div class="flex-shrink-0 -mt-16 relative">
                @if($user->profile->image != 'Default_pfp.jpg')
                    <img src="{{ asset('storage/' . $user->profile->image) }}" alt="{{ $user->name }}" class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg">
                @else
                    <img src="{{ asset('images/' . $user->profile->image) }}" alt="{{ $user->name }}" class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg">
                @endif
            </div>
            <div class="flex-grow space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                        <p class="text-gray-500"><span>@</span>{{ $user->username ?? 'user' . $user->id }}</p>
                    </div>
                    @if(auth()->check() && auth()->id() === $user->id)
                        <div class="flex flex-col gap-2">
                            <button
                                wire:click="editProfile"
                                class="px-4 py-2 rounded font-semibold transition
                                dark:text-white
                                dark:bg-zinc-700
                                dark:hover:bg-zinc-800
                                text-zinc-900
                                bg-zinc-200
                                hover:bg-zinc-300 focus:ring-2 focus:outline-none focus:ring-neutral-200
                                ">
                                Edit Profile
                            </button>
                        </div>
                    @else
                        <button class="px-4 py-2 rounded bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                            {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                        </button>
                    @endif
                </div>
                <div class="flex gap-6">
                    <div>
                        <span class="font-bold">{{ $followersCount }}</span>
                        <span class="text-gray-500">Followers</span>
                    </div>
                    <div>
                        <span class="font-bold">{{ $followingCount }}</span>
                        <span class="text-gray-500">Following</span>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ Str::limit($user->profile->bio, 100) }}
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
