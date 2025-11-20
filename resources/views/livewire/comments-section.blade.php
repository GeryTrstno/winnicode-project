<section class="py-4 antialiased">
    <div class="flex justify-center w-full">
        <div class="relative w-full rounded-xl">
            <flux:heading size="xl" class="mb-4">Discussions <span>({{ $comments->count() }})</span></flux:heading>

            {{-- Main Comment Form --}}
            <form action="{{ route('comment.store') }}" method="POST" class="mb-6">
                @csrf
                {{-- Hidden field untuk news_id --}}
                <input type="hidden" name="news_id" value="{{ $news->id }}">
                <input type="hidden" name="news_slug" value="{{ $news->slug }}">
                {{-- Tidak ada parent_comment_id untuk komentar utama --}}

                <flux:textarea class="mb-4" rows="auto" name="content"
                    placeholder="Write a comment..." required
                />
                <flux:button type="submit">
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
                                {{ $comment->user->name }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <time pubdate datetime="{{ $comment->created_at->format('Y-m-d') }}" title="{{ $comment->created_at->format('F d, Y') }}">
                                    {{ $comment->created_at->format('M d, Y') }}
                                </time>
                            </p>
                        </div>
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{ $comment->content }}</p>

                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button" onclick="toggleReplyForm({{ $comment->id }})"
                            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                            </svg>
                            Reply
                        </button>
                    </div>

                    {{-- Reply Form (Hidden by default) --}}
                    <div id="reply-form-{{ $comment->id }}" class="mt-4 hidden">
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                            <input type="hidden" name="news_slug" value="{{ $news->slug }}">

                            <flux:textarea class="mb-4" rows="auto" name="content"
                                placeholder="Write a reply..." required
                            />
                            <div class="flex space-x-2">
                                <flux:button type="submit" size="sm">
                                    Post Reply
                                </flux:button>
                                <flux:button type="button" variant="ghost" size="sm" onclick="toggleReplyForm({{ $comment->id }})">
                                    Cancel
                                </flux:button>
                            </div>
                        </form>
                    </div>
                </article>

                {{-- Display Replies --}}
                @foreach ($commentsReply as $commentReply)
                    @if ($commentReply->parent_comment_id == $comment->id)
                        <article class="p-6 mb-3 ml-6 lg:ml-12 text-base rounded-xl">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        @if($commentReply->user->profile->cover_image != 'cover.jpg')
                                            <img src="{{ asset('storage/' . $commentReply->user->profile->cover_image)}}" alt="{{ $commentReply->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                        @else
                                            <img src="{{ asset('images/' . $commentReply->user->profile->cover_image) }}" alt="{{ $commentReply->user->name }}" class="mr-2 w-6 h-6 rounded-full">
                                        @endif
                                        {{ $commentReply->user->name }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="{{ $commentReply->created_at->format('Y-m-d') }}" title="{{ $commentReply->created_at->format('F d, Y') }}">
                                            {{ $commentReply->created_at->format('M d, Y') }}
                                        </time>
                                    </p>
                                </div>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">{{ $commentReply->content }}</p>

                            {{-- Nested Reply Button --}}
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" onclick="toggleReplyForm('nested-{{ $commentReply->id }}')"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                    </svg>
                                    Reply
                                </button>
                            </div>

                            {{-- Nested Reply Form --}}
                            <div id="reply-form-nested-{{ $commentReply->id }}" class="mt-4 hidden">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                                    <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                    <input type="hidden" name="news_slug" value="{{ $news->slug }}">


                                    <flux:textarea class="mb-4" rows="auto" name="content"
                                        placeholder="Write a reply..." required
                                    />
                                    <div class="flex space-x-2">
                                        <flux:button type="submit" size="sm">
                                            Post Reply
                                        </flux:button>
                                        <flux:button type="button" variant="ghost" size="sm" onclick="toggleReplyForm('nested-{{ $commentReply->id }}')">
                                            Cancel
                                        </flux:button>
                                    </div>
                                </form>
                            </div>
                        </article>
                    @endif
                @endforeach

                <flux:separator></flux:separator>
            @endif
        @endforeach
    </div>
</section>

<script>
function toggleReplyForm(commentId) {
    const formId = typeof commentId === 'string' ? `reply-form-${commentId}` : `reply-form-${commentId}`;
    const form = document.getElementById(formId);

    if (form.classList.contains('hidden')) {
        form.classList.remove('hidden');
    } else {
        form.classList.add('hidden');
    }
}
</script>
