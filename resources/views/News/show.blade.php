<x-layouts.app :title="'News - ' . $news->title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative aspect-video w-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <img src="{{ asset('images/poto-dummy.png') }}" alt="Deskripsi Gambar" class="w-full h-full" />
        </div>
        <div class="flex justify-center w-full">
            <div class="relative w-full md:w-2/3 rounded-xl">
                @foreach ($news->categories as $category)
                    {{-- <flux:button href="{{ route('category', ['category' => $category->slug]) }}"
                        variant="primary"
                        class="mr-2 mb-2">
                        {{ $category->name }}
                    </flux:button> --}}
                @endforeach
                <h2 class="text-4xl font-bold">{{ $news->title }}</h2>
                <p class="mb-4 font-semibold text-2xl text-zinc-600 dark:text-zinc-400">{{ $news->caption }}</p>
                <flux:text class="mb-2" size="lg">
                    By
                    {{-- @foreach ($authors as $index => $author)
                        <flux:link href="#" >{{ $author }}</flux:link>@if ($index < $totalAuthors - 2), @elseif ($index == $totalAuthors - 2) and @endif
                    @endforeach --}}
                    {{-- <flux:link href="{{ route('profile', $news->users->username ?? 'user' . $news->users->id) }}" >{{ $news->users->name }}</flux:link> --}}
                </flux:text>
                <flux:text class="mb-6" size="lg" variant="subtle">
                    {{-- May, 03 2025 at 22.51 PM --}}
                    {{ $news->created_at->format('M, d Y \a\t H.i A') }}
                </flux:text>

                <div class="[&>p]:mb-6 [&>p]:block">
                    <div class="prose prose-lg max-w-none">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- <flux:separator></flux:separator>
        <section class="py-4 antialiased">
            <div class="flex justify-center w-full">
                <div class="relative w-full md:w-2/3 rounded-xl">
                    <flux:heading size="xl" class="mb-4">Discussions ({{ $numofDiscussions }})</flux:heading>
                    <form class="mb-6">
                        <flux:textarea class="mb-4" rows="auto"
                            placeholder="Write a comment..."
                        />
                        <flux:button>
                            Post comment
                        </flux:button>
                    </form>

                </div>
            </div>
        </section> --}}
    </div>
</x-layouts.app>
