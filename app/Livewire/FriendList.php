<?php

namespace App\Livewire;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendList extends Component
{
    public $users;
    public $user = null;
    public $friends;

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        if (!$this->user) {
            $this->user = User::find(Auth::id());
        }
        $this->users = $this->user->friend($this->user->id);
        return view('friend.friend-list');

    }
}
