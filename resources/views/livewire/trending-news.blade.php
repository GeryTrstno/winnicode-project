<div class="grid auto-rows-min gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @for ($i = 0; $i < 3; $i++)
        <div class="relative aspect-square overflow-hidden rounded-xl border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 grid grid-rows-2">
            <!-- Bagian Atas: Gambar -->
            <div class="row-span-1">
                <img src="images/poto-dummy.png" alt="Deskripsi Gambar" class="w-full h-full object-cover" />
            </div>

            <!-- Bagian Bawah: Tulisan -->
            <div class="row-span-1 p-4">
                <flux:button size="xs">Technology</flux:button>
                <h1 class="text-sm sm:text-lg md:text-xl font-bold mt-3">New Smartphone Features Unveiled at Tech Conferences</h1>
                <p class=" text-zinc-800 dark:text-zinc-300 text-xs sm:text-xs md:text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nunc ac nulla semper imperdiet eu quis dui. Aenean porta sapien pharetra sodales sed.</p>
            </div>
        </div>
    @endfor
</div>
