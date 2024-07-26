
<div>
        <img src="{{ $user->profile_photo_url }}" alt="{{ Auth::user()->name }}"
             class="card-img-top">
        <div class="card-body">
            <h5   class="card-title ">{{$user->name}}</h5>
            <h6  wire:poll >status : {{$user->status_user() }} </h6>
            <p class="card-text">Some quick example text to build on the card title and
                make up
                the
                bulk
                of
                the card's content.</p>
            @if(Auth::user()->isfriend($user->id))
                deja ami
            @else
                <button type="button" wire:click="addFriend" class="btn btn-primary">Ajouter en Ami</button>
            @endif
            <a class="btn btn-primary mt-2" href="">Envoyer un Message</a>
            <a class="btn btn-primary mt-2" href="{{ route('users.show' , $user->id)}}">voir le profil</a>
        </div>
    les ami
    @livewire('friend-list',['user'=>$user])
</div>
