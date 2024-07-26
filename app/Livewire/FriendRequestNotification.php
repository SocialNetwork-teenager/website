<?php

namespace App\Livewire;

use App\Models\Friends;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendRequestNotification extends Component
{
    public $userauth;
    public $username;
    public $id;
    /**
     * @var true
     */
    public $shownewfriendrequest = false;



    public function render()
    {
        return view('friend.friend-request-notification');
    }


    public function getListeners(): array
    {
        $this->userauth = auth()->user();
        return [
            // Private Channel
            "echo-private:add-friend.{$this->userauth->id},AddFriend" => 'friendrequest',
        ];
    }

    public function friendrequest($data)
    {
        $this->username = $data['username'];
        $this->id = $data['id'];
        $this->shownewfriendrequest = true;
    }

    public function accept()
    {
        Friends::where('userrequest_id', $this->id)->where('userreceiver_id',Auth::id())->update(['accepted' => true]);
        session()->flash('friendaccepted', trans('You have accepted your friend request!'));
        $this->shownewfriendrequest = false;
    }

    public function deny()
    {
        Friends::where('userrequest_id', $this->id)->where('userreceiver_id',Auth::id())->update(['accepted' => false]);
        session()->flash('frienddeny', trans('You have denied your friend request!'));
        $this->shownewfriendrequest = false;
    }

}
