<x-layouts.app :title="__('Create News')">
    <div class="max-w-3xl mx-auto w-full bg-white dark:bg-zinc-900 rounded-2xl p-10 shadow-2xl space-y-8">
        <h1 class="text-4xl font-bold text-zinc-800 dark:text-white text-center">{{ __('Create News') }}</h1>

        <form id="news-form" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

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
                    <div wire:ignore id="quill-editor" class="min-h-[200px] rounded-b-xl p-4 bg-white dark:bg-zinc-800 text-black dark:text-white"></div>
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

            {{-- Submit Button --}}
            <div>
                <flux:button type="submit" class="w-full py-3 text-lg font-semibold rounded-xl bg-blue-600 hover:bg-blue-700 text-white dark:bg-blue-500 dark:hover:bg-blue-600 transition-colors">
                    {{ __('Create News') }}
                </flux:button>
            </div>
        </form>
    </div>

    {{-- Style for Quill placeholder color --}}
    <style>
        .ql-editor::before {
            color: #a1a1aa !important; /* Tailwind zinc-400 */
            font-style: italic;
        }

        .dark .ql-editor::before {
            color: #a1a1aa !important;
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
</x-layouts.app>
