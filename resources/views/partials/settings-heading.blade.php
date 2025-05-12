<div class="flex items-start justify-between">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Settings') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your profile and account settings') }}</flux:subheading>
    </div>

    <div class="ml-4 flex-shrink-0">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <flux:button type="submit" size="sm" class="w-[10vh] mt-2" variant="primary">
                {{ __('Log out') }}
            </flux:button>
        </form>

    </div>

</div>

<flux:separator class="mb-5"></flux:separator>
