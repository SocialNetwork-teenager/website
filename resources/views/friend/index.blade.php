<x-app-layout>

    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        @livewire('friend-list')
</x-app-layout>
