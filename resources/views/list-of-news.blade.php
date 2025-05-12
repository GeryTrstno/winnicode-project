@php
    $subcategories = [
        (object) ['slug' => 'market', 'name' => 'Market'],
        (object) ['slug' => 'Stock', 'name' => 'stock'],
        (object) ['slug' => 'economics', 'name' => 'Economics'],
        (object) ['slug' => 'cryptocurrency', 'name' => 'Cryptocurrency'],
        (object) ['slug' => 'forex', 'name' => 'Forex'],
        (object) ['slug' => 'business', 'name' => 'Business'],
        (object) ['slug' => 'investing', 'name' => 'Investing'],
        (object) ['slug' => 'real-estate', 'name' => 'Real Estate'],
        (object) ['slug' => 'retirement', 'name' => 'Retirement'],
        (object) ['slug' => 'financial-planning', 'name' => 'Financial Planning'],
        (object) ['slug' => 'insurance', 'name' => 'Insurance'],
    ];
@endphp

<x-layouts.app :title="__('News')">
    <flux:heading class="mb-3" size="xl">Economy</flux:heading>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex flex-row gap-2 flex-wrap">
            @foreach ($subcategories as $subcategory)
                <flux:button size="sm" href="{{ route('news') }}" variant="filled">
                    {{ $subcategory->name }}
                </flux:button>

            @endforeach
        </div>
        <flux:separator class="mt-4 mb-4"></flux:separator>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                    <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                </div>
                <div class="relative mt-4">
                    <h2 class="text-3xl font-bold">News Smartphone Features Unveiled at Tech Conferences</h2>
                    <p class="text-zinc-600 dark:text-zinc-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi natus quo pariatur voluptate doloremque ipsam, blanditiis enim deserunt accusantium aperiam harum fugiat adipisci, recusandae quasi dicta nisi nostrum odit aspernatur!</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6">

                @for ($i = 0; $i < 3; $i++)
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                        <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                    </div>
                @endfor
            </div>
        </div>
        <flux:separator class="mb-4 mt-4"></flux:separator>

        <livewire:news-feed />
    </div>
</x-layouts.app>



