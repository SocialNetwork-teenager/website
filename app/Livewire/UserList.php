<?php

namespace App\Livewire;

use App\Events\AddFriend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserList extends Component
{
    public $users;

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $this->users = User::where('email_verified_at', '!=', null)->where('id','!=',Auth::user()->id)->get();
        return view('user.user-list');
    }

}
