<x-layouts.app :title="__('Profile')">
    @php
        // Data dummy statis - ganti dengan data nyata dari aplikasi kamu
        $isFollowing = false; // Status mengikuti
    @endphp

    <div class="flex flex-col w-full gap-6 mx-auto">
        <!-- Bagian Foto Sampul -->
        <div class="relative h-full overflow-hidden rounded-lg bg-gray-200 dark:bg-gray-700">
            <img src="https://placehold.co/1600x400/dedede/555/?text=Profile+Cover"
                 alt="Cover photo for {{ $user->name }}"
                 class="object-cover w-full h-full">
        </div>

        <!-- Bagian Header Profil -->
        <div class="flex flex-col sm:flex-row items-start gap-6 px-4">
            <!-- Bagian Avatar -->
            <div class="flex-shrink-0 -mt-16 relative">
                <img src="{{ $user->profile->image }}"
                     class="w-40 h-40 rounded-full border-4 border-white dark:border-gray-800 object-cover shadow-lg">
            </div>

            <!-- Bagian Informasi Pengguna dan Tombol Follow -->
            <div class="flex-grow space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                </div>

            </div>
        </div>

        <flux:spacer></flux:spacer>
        <flux:separator></flux:separator>

        <livewire:news-feed :userId="$user->id" />
    </div>
</x-layouts.app>
