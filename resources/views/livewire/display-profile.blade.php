<div class="flex flex-col w-full gap-6 mx-auto dark:bg-zinc-900 rounded-xl p-6 mb-2">
    <div class="relative h-full overflow-hidden rounded-lg bg-gray-200 dark:bg-gray-700">
        <img src="https://placehold.co/1600x400/dedede/555/?text=Profile+Cover"
             alt="Cover photo for {{ $user->name }}"
             class="object-cover w-full h-full">
    </div>

    @if($editMode)
        <!-- MODE EDIT PROFILE -->
        <form wire:submit.prevent="save" class="flex flex-col sm:flex-row items-start gap-6 px-4">
            <div class="flex-shrink-0 -mt-16 relative">
                <img
                src="{{
                    $user->profile->image
                }}"
                alt="{{ $editMode ? $name : $user->name }}"
                class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg" />
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
                        {{-- @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                    </div>
                </div>
                <div class="flex gap-6">
                    <div>
                        <span class="font-bold">{{ $user->profile->followers }}</span>
                        <span class="text-gray-500">Followers</span>
                    </div>
                    <div>
                        <span class="font-bold">{{ $user->profile->following }}</span>
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
                <div class="flex gap-3 mt-4">
                    <button type="submit" class="px-6 py-2 font-semibold text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-300! dark:focus:ring-neutral-200!">Simpan</button>
                    <button type="button" wire:click="cancelEdit" class="px-6 py-2 font-semibold
        bg-white text-zinc-900
        hover:bg-neutral-100
        focus:ring-4 focus:outline-none focus:ring-neutral-200
        dark:bg-zinc-700 dark:text-white
        dark:hover:bg-zinc-900 dark:focus:ring-zinc-300
        rounded-lg transition">Batal</button>
                </div>
            </div>
        </form>
    @else
        <!-- MODE DISPLAY PROFILE -->
        <div class="flex flex-col sm:flex-row items-start gap-6 px-4">
            <div class="flex-shrink-0 -mt-16 relative">
                <img
                    src="{{
                        $user->profile->image
                    }}"
                    alt="{{ $editMode ? $name : $user->name }}"
                    class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg" />
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
                                class="px-4 py-2 rounded bg-gray-600 text-white font-semibold hover:bg-gray-700 transition">
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
                        <span class="font-bold">{{ $user->profile->followers }}</span>
                        <span class="text-gray-500">Followers</span>
                    </div>
                    <div>
                        <span class="font-bold">{{ $user->profile->following }}</span>
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
