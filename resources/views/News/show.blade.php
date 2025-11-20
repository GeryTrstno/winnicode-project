<x-layouts.app :title="'News - ' . $news->title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative aspect-video w-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image)}}" alt="{{ $news->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500">No Image</span>
                </div>
            @endif
        </div>
        <div class="flex justify-center w-full">
            <div class="relative w-full md:w-2/3 rounded-xl">
                @foreach ($news->categories as $category)
                    <flux:button href="{{ route('category.show', ['category' => $category->slug]) }}"
                        variant="primary"
                        class="mr-2 mb-2">
                        {{ $category->name }}
                    </flux:button>
                @endforeach

                @if (auth()->user()->role === 'admin')

                    @if ($news->status === 'pending')
                        <form action="{{ route('admin.accept', $news->id) }}" method="POST" class="inline-block absolute top-0 right-0">
                            @csrf
                            @method('POST')
                            <button type="submit" class="mr-24 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                                Accept
                            </button>
                        </form>

                        <form action="{{ route('admin.reject', $news->id) }}" method="POST" class="inline-block absolute top-0 right-0">
                            @csrf
                            @method('POST')
                            <button type="submit" class="ml-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                Reject
                            </button>
                        </form>
                    @endif

                    @if ($news->status === 'published')

                        <form action="{{ route('admin.delete', $news->id) }}" method="POST" class="inline-block absolute top-0 right-0">
                            @csrf
                            @method('POST')
                            <button type="submit" class="ml-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                Delete
                            </button>
                        </form>
                    @endif
                @endif
                <h2 class="text-4xl font-bold">{{ $news->title }}</h2>
                <p class="mb-4 font-semibold text-2xl text-zinc-600 dark:text-zinc-400">{{ $news->caption }}</p>
                <flux:text class="mb-2" size="lg">
                    <span>By </span>
                    {{-- @foreach ($authors as $index => $author)
                        <flux:link href="#" >{{ $author }}</flux:link>@if ($index < $totalAuthors - 2), @elseif ($index == $totalAuthors - 2) and @endif
                    @endforeach --}}
                    <flux:link href="{{ route('user.show', $news->users->username ?? 'user' . $news->users->id) }}" >{{ $news->users->name }}</flux:link>
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

        @if ($news->status === 'published')
            <livewire:comments-section :newsId="$news->id" />
        @endif
    </div>
</x-layouts.app>
