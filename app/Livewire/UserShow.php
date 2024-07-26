<?php

namespace App\Livewire;

use App\Events\AddFriend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserShow extends Component
{
    public $user;



    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $this->user = User::find($this->user->id);
        return view('user.user-show');
    }
}
