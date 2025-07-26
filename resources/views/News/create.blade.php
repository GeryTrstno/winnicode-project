{{-- filepath: c:\Users\geryt\Documents\winnicode-project\resources\views\new-news.blade.php --}}
<x-layouts.app :title="__('Create News')">
    <div class="max-w-2xl mx-auto w-full bg-white dark:bg-zinc-800 rounded-xl p-8 shadow space-y-6">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Judul</label>
                <input type="text" name="title" class="w-full rounded border px-3 py-2 bg-gray-100 dark:bg-zinc-900 dark:text-white" required>
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Category</label>
                <select name="category_id" class="w-full rounded border px-3 py-2 bg-gray-100 dark:bg-zinc-900 dark:text-white" required>
                    <option value="">Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Subkategori --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Sub Category</label>
                <select name="subcategory_id" class="w-full rounded border px-3 py-2 bg-gray-100 dark:bg-zinc-900 dark:text-white">
                    <option value="">Choose Subcategory</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Isi Konten --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Isi Konten</label>
                <textarea name="content" rows="6" class="w-full rounded border px-3 py-2 bg-gray-100 dark:bg-zinc-900 dark:text-white" required></textarea>
            </div>

            {{-- Caption --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Caption</label>
                <input type="text" name="caption" class="w-full rounded border px-3 py-2 bg-gray-100 dark:bg-zinc-900 dark:text-white">
            </div>

            {{-- Image --}}
            <div>
                <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Image</label>
                <input type="file" name="image" accept="image/*" class="w-full text-gray-700 dark:text-gray-200">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 rounded bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">Buat News</button>
            </div>
        </form>
    </div>
</x-layouts.app>
