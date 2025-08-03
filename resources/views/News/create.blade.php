<x-layouts.app :title="__('Create News')">
    <div class="max-w-4xl mx-auto w-full bg-white dark:bg-zinc-900 rounded-2xl p-10 shadow-2xl space-y-8">
        <h1 class="text-4xl font-bold text-zinc-800 dark:text-white text-center">{{ __('Create Article') }}</h1>

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
                    <div wire:ignore id="quill-editor" class="min-h-[250px] rounded-b-xl p-4 bg-white dark:bg-zinc-800 text-black dark:text-zinc-100"></div>
                    <input type="hidden" name="content" id="content-input">
                </div>
                @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2">
                {{-- Category --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Category') }}</flux:text>
                    <p class="text-xs text-black dark:text-zinc-200 mb-2">Choose Max. 3</p>
                    <flux:checkbox.group wire:model="selectedCategories" label="">
                        @foreach($categories as $category)
                            <flux:checkbox name="categories[]" label="{{ $category->name }}" value="{{ $category->id }}" />
                        @endforeach
                    </flux:checkbox.group>
                </div>

                {{-- SubCategory --}}
                <div>
                    <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('SubCategory') }}</flux:text>
                    <p class="text-xs text-black dark:text-zinc-200 mb-2">Choose Max. 6</p>
                    <flux:checkbox.group wire:model="selectedSubCategories" label="">
                        @foreach($subcategories as $subcategory)
                            <flux:checkbox name="subcategories[]" label="{{ $subcategory->name }}" value="{{ $subcategory->id }}" />
                        @endforeach
                    </flux:checkbox.group>
                </div>
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

            {{-- Caption --}}
            <div>
                <flux:text size="xl" class="mb-1 dark:text-white text-zinc-900 font-medium">{{ __('Caption') }}</flux:text>
                <flux:input
                    name="caption"
                    class="w-full border border-zinc-300 dark:border-zinc-200 rounded-xl"
                />
                @error('caption') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <flux:button type="submit" variant="primary" class="w-1/4 py-3 text-lg font-semibold rounded-xl bg-blue-600 hover:bg-blue-700 text-white dark:text-zinc-900 dark:bg-zinc-100 dark:hover:bg-zinc-400 transition-colors">
                    {{ __('Create Article') }}
                </flux:button>
            </div>
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
                background-color: #a1a1aa; /* Custom color for resize handle */
                border-radius: 2px 0px 10px 0px;
            }

            /* Loading state untuk editor */
            .quill-loading {
                background: #f3f4f6;
                border: 1px dashed #d1d5db;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #6b7280;
                font-style: italic;
            }
        </style>

        {{-- Script for Quill dengan multiple fallback methods --}}
        <script>
            // Global variable untuk tracking
            let quillInstance = null;
            let initAttempts = 0;
            const maxAttempts = 10;

            function initializeQuill() {
                initAttempts++;

                // Check jika Quill sudah tersedia
                if (typeof Quill === 'undefined') {
                    if (initAttempts < maxAttempts) {
                        console.log(`Quill not ready, attempt ${initAttempts}/${maxAttempts}`);
                        setTimeout(initializeQuill, 200);
                        return;
                    } else {
                        console.error('Quill failed to load after maximum attempts');
                        return;
                    }
                }

                // Check jika sudah diinisialisasi
                if (quillInstance) {
                    return;
                }

                try {
                    const editorElement = document.getElementById('quill-editor');
                    if (!editorElement) {
                        console.error('Quill editor element not found');
                        return;
                    }

                    // Remove loading class jika ada
                    editorElement.classList.remove('quill-loading');

                    quillInstance = new Quill('#quill-editor', {
                        theme: 'snow',
                        placeholder: '    Write your content here...',
                        modules: {
                            toolbar: [
                                [{ 'header': [1, 2, 3, false] }],
                                ['bold', 'italic', 'underline'],
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                ['link', 'image'],
                                [{ 'align': [] }],
                                ['clean']
                            ]
                        }
                    });

                    console.log('Quill editor initialized successfully');

                    // Setup form submit handler
                    const form = document.getElementById('news-form');
                    const contentInput = document.getElementById('content-input');

                    if (form && contentInput) {
                        form.addEventListener('submit', function () {
                            contentInput.value = quillInstance.root.innerHTML.trim();
                        });
                    }

                } catch (error) {
                    console.error('Error initializing Quill:', error);
                }
            }

            // Multiple initialization strategies

            // 1. DOM Content Loaded
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeQuill);
            } else {
                // DOM sudah ready
                initializeQuill();
            }

            // 2. Window load sebagai fallback
            window.addEventListener('load', function() {
                if (!quillInstance) {
                    setTimeout(initializeQuill, 100);
                }
            });

            // 3. Livewire hooks jika menggunakan Livewire
            if (typeof Livewire !== 'undefined') {
                Livewire.hook('component.initialized', () => {
                    if (!quillInstance) {
                        setTimeout(initializeQuill, 100);
                    }
                });

                Livewire.hook('element.updated', () => {
                    if (!quillInstance) {
                        setTimeout(initializeQuill, 100);
                    }
                });
            }

            // 4. Intersection Observer sebagai fallback terakhir
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !quillInstance) {
                            setTimeout(initializeQuill, 100);
                            observer.disconnect();
                        }
                    });
                });

                // Observe ketika DOM ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', () => {
                        const editorElement = document.getElementById('quill-editor');
                        if (editorElement) {
                            observer.observe(editorElement);
                        }
                    });
                } else {
                    const editorElement = document.getElementById('quill-editor');
                    if (editorElement) {
                        observer.observe(editorElement);
                    }
                }
            }
        </script>
    </div>
</x-layouts.app>
