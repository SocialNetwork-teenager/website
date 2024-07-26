<div>
    @if($users->isnotempty())
        <div class="container">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-auto">
                        @livewire('user-card',['user' => $user])
                    </div>
                @endforeach
            </div>
        </div>
    @else
        Pas d'ami
    @endif
</div>
