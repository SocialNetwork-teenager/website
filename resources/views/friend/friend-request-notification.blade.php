<div>
    <x-dialog-modal wire:model="showfriendnotification">
        <x-slot name="title">
            {{ __("Demande d'ami") }}
        </x-slot>

        <x-slot name="content">
            {{__('You have friend Request from')}}{{$this->username}}
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="accept" class="btn btn-primary">{{__('Accept')}}</button>
            <button type="button" wire:click="deny" class="btn btn-danger">{{__('Deny')}}</button>
        </x-slot>
    </x-dialog-modal>

    @if (session('frienddeny'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ session('frienddeny') }}{{$this->username}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('friendaccepted'))

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> {{ session('friendaccepted')}}{{$this->username}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('friend'))

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> {{ session('friendaccepted')}}{{$this->username}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('friendremoved'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> {{$this->username}} {{ session('friendremoved')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('friendconfirmremoved'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> {{$this->username}} {{ session('friendconfirmremoved')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('friendconfirmadded'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> {{$this->username}} {{ session('friendconfirmadded')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


</div>
