<flux:footer container class="border-t border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="relative overflow-hidden rounded-xl p-4 sm:p-6 md:p-8">
            <flux:heading class="text-center" size="xl">Stay Updated</flux:heading>
            <flux:text class="text-center mt-2" size="xl">Subscribe to our newsletter to receive the latest news directly in your inbox.</flux:text>
            <div class="flex justify-center mt-8 mb-2">
                <flux:input.group class="w-full max-w-sm md:max-w-md lg:max-w-lg">
                    <flux:input placeholder="Your Email Address..."></flux:input>
                    <flux:button variant="filled">Subscribe</flux:button>
                </flux:input.group>
            </div>
        </div>

        <flux:separator />

        <div class="grid gap-8 py-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <div>
                <flux:heading size="lg" class="mb-4">News Times</flux:heading>
                <flux:text>Delivering accurate and timely news around the world</flux:text>
            </div>

            <div>
                <flux:heading size="lg" class="mb-4">Categories</flux:heading>
                <div class="space-y-2">
                    {{-- @foreach ($categories as $category)
                        <div>
                            <a href="{{ route('category', $category->slug) }}">
                                <flux:text class="hover:text-zinc-800 dark:hover:text-white">{{ $category->name }}</flux:text>
                            </a>
                        </div>
                    @endforeach --}}
                </div>
            </div>


            <div>
                <flux:heading size="lg" class="mb-4">Quick Links</flux:heading>
                <div class="space-y-2">
                    {{-- @foreach($quickLinks as $link)
                            <div>
                                <a href="{{ route($link['route']) }}">
                                    <flux:text class="hover:text-zinc-800 dark:hover:text-white">{{ $link['name'] }}</flux:text>
                                </a>
                            </div>
                    @endforeach --}}
                    @auth
                        {{-- <a href="{{ route('profile', ['user' => auth()->user()->username ?? 'user' . auth()->user()->id]) }}">
                            <flux:text class="hover:text-zinc-800 dark:hover:text-white">Profile</flux:text>
                        </a> --}}
                    @endauth
                </div>
            </div>

            <div>
                <flux:heading size="lg" class="mb-4">Contact Us</flux:heading>

                <div class="flex items-center mb-3">
                    <flux:icon.www></flux:icon.www>
                    <flux:text class="ms-3">info@newstimes.com</flux:text>
                </div>
                <div class="flex items-center mb-3">
                    <flux:icon.phone></flux:icon.phone>
                    <flux:text class="ms-3">+1 234 567 890</flux:text>
                </div>
                <div class="flex items-center mb-3">
                    <flux:icon.map-pin></flux:icon.map-pin>
                    <flux:text class="ms-3">123 News street, Media City</flux:text>
                </div>
            </div>
        </div>

        <flux:separator />

        <!-- Bottom Bar -->
        <div class="flex flex-wrap items-center gap-6 py-6">
            <flux:text>© 2025 News Times. All rights reserved.</flux:text>

            <flux:spacer></flux:spacer>

            <div class="flex flex-wrap gap-6">
                {{-- @foreach($policies as $policy)
                    <a href="{{ $policy['path'] }}">
                        <flux:text class="hover:text-zinc-800 dark:hover:text-white">{{ $policy['name'] }}</flux:text>
                    </a>
                @endforeach --}}
            </div>
        </div>
</flux:footer>

