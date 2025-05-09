<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <div class="hidden sm:block">
                <a href="{{ route('dashboard') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0" wire:navigate>
                    <x-app-logo />
                </a>
            </div>
            <flux:spacer />

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item icon="home-icon" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Home') }}
                </flux:navbar.item>

                <flux:navbar.item icon="book-open-text" :href="route('news')" :current="request()->routeIs('news')" wire:navigate>
                    {{ __('News') }}
                </flux:navbar.item>

                <flux:navbar.item icon="about-us-icon" :href="route('about-us')" :current="request()->routeIs('about-us')" wire:navigate>
                    {{ __('About Us') }}
                </flux:navbar.item>

                <flux:navbar.item icon="profile-icon" :href="route('settings.profile')" :current="request()->routeIs(['settings.profile', 'settings.password', 'settings.appearance'])"  wire:navigate>
                    {{ __('Profile') }}
                </flux:navbar.item>
            </flux:navbar>

            <div class="lg:hidden">
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
            </div>

        </flux:header>


        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')">
                    <flux:navlist.item icon="home-icon" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Home') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="book-open-text" :href="route('news')" :current="request()->routeIs('news')" wire:navigate>
                    {{ __('News') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="about-us-icon" :href="route('about-us')" :current="request()->routeIs('abous-us')" wire:navigate>
                    {{ __('About Us') }}
                    </flux:navlist.item>

                </flux:navlist.group>

            </flux:navlist>

            <flux:spacer />
        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
