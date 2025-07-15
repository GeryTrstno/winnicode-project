<x-layouts.app :title="__('Profile')">
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
</x-layouts.app>



