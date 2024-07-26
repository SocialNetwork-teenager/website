<div>

    @if($users)

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
        no user
    @endif
</div>
