<div>
    <h1 class="text-4xl font-bold text-zinc-800 dark:text-white text-center">{{ __('Create Article') }}</h1>

        <form id="news-form" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if ($page == 1)
                {{-- Page 1: Title, Content, Caption, Image --}}
                {{-- Title --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Title') }}</flux:text>
                    <flux:input
                        name="title"
                        class="w-full border border-zinc-300 dark:border-zinc-200 rounded-xl"
                        required
                    />
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Content --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Content') }}</flux:text>
                    <div class="rounded-xl border border-zinc-300 dark:border-zinc-700">
                        <div wire:ignore id="quill-editor" class="min-h-[250px] rounded-b-xl p-4 bg-white dark:bg-zinc-800 text-black dark:text-zinc-100"></div>
                        <input type="hidden" name="content" id="content-input">
                    </div>
                    @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Caption --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Caption') }}</flux:text>
                    <flux:input
                        name="caption"
                        class="w-full border border-zinc-300 dark:border-zinc-200 rounded-xl"
                    />
                    @error('caption') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Image --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Image') }}</flux:text>
                    <input
                        type="file"
                        name="image"
                        accept="image/*"
                        class="block w-full text-sm text-zinc-900 dark:text-zinc-200
                            file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold
                            file:bg-blue-600 file:text-white hover:file:bg-blue-700
                            dark:file:bg-zinc-700 dark:file:text-white dark:hover:file:bg-zinc-600
                            "
                    />
                    @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <flux:button></flux:button>
            @elseif ($page == 2)
                {{-- Ini Untuk Category --}}


                <flux:button></flux:button>
            @elseif ($page == 3)

                {{-- Submit Button --}}
                <div>
                    <flux:button type="submit" class="w-full py-3 text-lg font-semibold rounded-xl bg-blue-600 hover:bg-blue-700 text-white dark:bg-blue-500 dark:hover:bg-blue-600 transition-colors">
                        {{ __('Create News') }}
                    </flux:button>
                </div>
            @endif

        </form>
    {{-- Style for Quill placeholder color --}}
    <style>
        .ql-editor::before {
            color: #a1a1aa !important; /* Tailwind zinc-400 */
            font-style: italic;
        }

        .dark .ql-editor::before {
            color: #ffffff !important;
        }

        /* For resizeable editor height */
        #quill-editor {
            resize: vertical;
            overflow: auto;
            min-height: 250px; /* Minimum height */
        }

        #quill-editor::-webkit-resizer {
            background-color: #ffffff; /* Custom color for resize handle */
            border-radius: 0px 0px 10px 0px;
        }
    </style>

    {{-- Script for Quill --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Write your news content here...',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'image'],
                        [{ 'align': [] }],
                        ['clean']
                    ]
                }
            });

            const form = document.getElementById('news-form');
            const contentInput = document.getElementById('content-input');

            form.addEventListener('submit', function () {
                contentInput.value = quill.root.innerHTML.trim();
            });
        });
    </script>
</div>
