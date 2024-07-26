<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Profile of ') }} {{$user->name}}
        </h2>
    </x-slot>
    @livewire('user-show',['user' => $user])
</x-app-layout>
