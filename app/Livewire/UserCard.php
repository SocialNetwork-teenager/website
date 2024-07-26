<?php

namespace App\Livewire;

use App\Events\AddFriend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class UserCard extends Component
{
    public $user;

        public function getListeners(): array

    {
        $this->userauth = auth()->user();
        return [
            // Private Channel
            "echo-presence:online,joining" => 'user_joining',
            "echo-presence:online,leaving" => 'user_leave',
            "echo-presence:online,here" => 'user_here',
        ];
    }
        public function user_leave($data)
    {
        User::where("id",$data['id'])->update(["status" => false]);
    }


        public function user_joining($data)
    {
        User::where("id", $data['id'])->update(["status" => true]);

    }

           public function user_here($data)
    {
        foreach ($data as $user_connected){
                    User::where("id", $user_connected['id'])->update(["status" => true]);

        }

    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {

        return view('user.user-card');
    }

    public function addFriend(): void
    {
        Auth::user()->addFriend($this->user->id);
        event(new AddFriend($this->user , Auth::user()));
    }

    public function showuser($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
            $user = User::find($id)->get();
            return redirect("/user/$user->id");
    }

    public function removeFriend()
    {
        Auth::user()->removeFriend($this->user->id);
    }
}
