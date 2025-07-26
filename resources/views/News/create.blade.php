<x-layouts.app :title="__('Create News')">
    <div class="max-w-2xl mx-auto w-full bg-white dark:bg-zinc-800 rounded-xl p-8 shadow space-y-6">
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <flux:input name="title" label="{{ __('Title') }}" required />
            </div>
            <div class="space-y-4">
                <flux:input name="content" label="{{ __('Content') }}" required />
            </div>
            <div class="mt-6">
                <flux:button type="submit" class="w-full">
                    {{ __('Create News') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>
