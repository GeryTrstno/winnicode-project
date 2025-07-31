<section class="py-4 antialiased">
    <div class="flex justify-center w-full">
        <div class="relative w-full rounded-xl">
            <flux:heading size="xl" class="mb-4">Discussions <span>({{ $comments->count() }})</span></flux:heading>
            <form class="mb-6">
                <flux:textarea class="mb-4" rows="auto" name="user-comment"
                    placeholder="Write a comment..."
                />
                <flux:button>
                    Post comment
                </flux:button>
            </form>
        </div>
    </div>
    <div>
        @foreach ($comments as $comment)
            @if ($comment->parent_comment_id == null)
                <article class="p-6 text-base rounded-xl">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                @if($comment->user->profile->cover_image != 'cover.jpg')
                                    <img src="{{ asset('storage/' . $comment->user->profile->cover_image)}}" alt="{{ $comment->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                @else
                                    <img src="{{ asset('images/' . $comment->user->profile->cover_image) }}" alt="{{ $comment->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                @endif
                                {{ $comment->user->name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="Dates">{{ $comment->created_at->format('M d, Y') }}</time></p>
                        </div>
                        {{-- <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div> --}}
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{ $comment->content }}</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                @foreach ($commentsReply as $commentReply)
                    @if ($commentReply->parent_comment_id == $comment->id)
                        {{-- This is Reply --}}
                        <article class="p-6 mb-3 ml-6 lg:ml-12 text-base rounded-xl">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        @if($comment->user->profile->cover_image != 'cover.jpg')
                                            <img src="{{ asset('storage/' . $comment->user->profile->cover_image)}}" alt="{{ $comment->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                        @else
                                            <img src="{{ asset('images/' . $comment->user->profile->cover_image) }}" alt="{{ $comment->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                        @endif
                                        {{ $commentReply->user->name }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                            title="February 12th, 2022">{{ $comment->created_at->format('M d, Y') }}</time></p>
                                </div>
                                {{-- <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment2"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">{{ $commentReply->content }}</p>

                        </article>

                    @endif
                @endforeach
                <flux:separator></flux:separator>
            @endif
        @endforeach
    </div>
</section>
