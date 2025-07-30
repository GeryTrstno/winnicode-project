<flux:header sticky class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    @auth
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    @endauth

    <div class="flex items-center">
        <div class="hidden lg:block xl:block">
            <a href="{{ route('home') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0 mr-10" wire:navigate>
                <x-app-logo />
            </a>
        </div>

        @auth
            <div class="hidden md:block lg:block xl:block">
                <livewire:search-bar />
            </div>
        @endauth
    </div>

    <flux:spacer></flux:spacer>

    <flux:navbar class="-mb-px max-lg:hidden">
        @if (Route::has('login'))
            @auth
                <flux:navbar.item icon="home-icon" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{ __('Home') }}
                </flux:navbar.item>

                <flux:navbar.item icon="book-open-text" :href="route('news.index')" :current="request()->routeIs('news.index')" wire:navigate>
                    {{ __('News') }}
                </flux:navbar.item>

                <flux:navbar.item icon="about-us-icon" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{ __('About Us') }}
                </flux:navbar.item>
                <flux:dropdown position="bottom" align="end">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                    />
                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item href="{{ route('user.show', auth()->user()->username ?? 'user' . auth()->user()->id) }}" icon="user-circle" wire:navigate>{{ __('Profile') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            @else
                <flux:spacer></flux:spacer>

                <flux:button class="text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-neutral-200!" :href="route('login')" wire:navigate>
                    {{ __('Login') }}
                </flux:button>

                @if (Route::has('register'))
                    <flux:button class="ml-2 text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:text-zinc-900! dark:bg-white! dark:hover:bg-neutral-100! dark:focus:ring-neutral-200!" :href="route('register')" wire:navigate>
                        {{ __('Register') }}
                    </flux:button>
                @endif
            @endauth
        @endif
    </flux:navbar>


                            <div class="lg:hidden">
                                @if (Route::has('login'))
                                    <nav class="flex items-center justify-end gap-4">
                                        @auth
                                            <flux:dropdown position="bottom" align="end">
                                                <flux:profile
                                                    :name="auth()->user()->name"
                                                    :initials="auth()->user()->initials()"
                                                    icon-trailing="chevrons-up-down"
                                                />
                                                <flux:menu class="w-[220px]">
                                                <flux:menu.radio.group>
                                                    <div class="p-0 text-sm font-normal">
                                                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                                                <span
                                                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                                                >
                                                                    {{ auth()->user()->initials() }}
                                                                </span>
                                                            </span>

                                                            <div class="grid flex-1 text-start text-sm leading-tight">
                                                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </flux:menu.radio.group>


                                                <flux:menu.radio.group>
                                                    {{-- <flux:menu.item :href="{{ route('profile', ['user' => auth()->user()->username ?? 'user' . auth()->user()->id]) }}" icon="user-circle" wire:navigate>{{ __('Profile') }}</flux:menu.item> --}}
                                                </flux:menu.radio.group>

                                                <flux:menu.separator />

                                                <flux:menu.radio.group>
                                                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                                                </flux:menu.radio.group>

                                                <flux:menu.separator />

                                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                                    @csrf
                                                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                                        {{ __('Log Out') }}
                                                    </flux:menu.item>
                                                </form>
                                                </flux:menu>
                                            </flux:dropdown>
                                        @else
                                            <flux:spacer></flux:spacer>
                                            <flux:button class="text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:bg-zinc-600 dark:hover:bg-zinc-700 dark:focus:ring-zinc-800" :href="route('login')" wire:navigate>
                                                {{ __('Login') }}
                                            </flux:button>

                                            @if (Route::has('register'))
                                                <flux:button class="text-white! bg-zinc-700 rounded-lg hover:bg-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 dark:bg-zinc-600 dark:hover:bg-zinc-700 dark:focus:ring-zinc-800" :href="route('register')" wire:navigate>
                                                    {{ __('Register') }}
                                                </flux:button>
                                        @endif
                                        @endauth
                                    </nav>
                                @endif

                            </div>
</flux:header>


<!-- Mobile Menu -->
<flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('home') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo />
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Platform')">
            <flux:navlist.item icon="home-icon" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
            {{ __('Home') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" :href="route('news.index')" :current="request()->routeIs('news.index')" wire:navigate>
            {{ __('News') }}
            </flux:navlist.item>

            <flux:navlist.item icon="about-us-icon" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
            {{ __('About Us') }}
            </flux:navlist.item>

        </flux:navlist.group>
    </flux:navlist>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Categories')">
            @foreach ($categories as $category)
                <flux:navmenu.item href="/categories/{{ $category->slug }}">{{ $category->name }}</flux:navmenu.item>
            @endforeach
        </flux:navlist.group>
    </flux:navlist>
</flux:sidebar>
