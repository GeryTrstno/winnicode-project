<flux:footer container class="border-t border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <div class="flex flex-wrap items-center">
            <flux:text>© 2025 News Times. All rights reserved.</flux:text>

            <flux:spacer></flux:spacer>

            <div class="flex flex-wrap gap-6">
                @foreach($policies as $policy)
                    <a href="{{ $policy['path'] }}">
                        <flux:text class="hover:text-zinc-800 dark:hover:text-white">{{ $policy['name'] }}</flux:text>
                    </a>
                @endforeach
            </div>
        </div>
</flux:footer>
