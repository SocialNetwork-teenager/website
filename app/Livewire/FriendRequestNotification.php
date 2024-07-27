<?php

namespace App\Livewire;

use App\Events\ConfirmAddFriend;
use App\Events\ConfirmRemoveFriend;
use App\Events\RemoveFriend;
use App\Models\Friends;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendRequestNotification extends Component
{
    public $userauth;
    public $username;
    public $id;
    public $user;
    public $userrequested;
    /**
     * @var true
     */
    public $showfriendnotification = false;




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
            "echo-private:remove-friend.{$this->userauth->id},RemoveFriend" => 'removefriend',
            "echo-private:confirm-remove-friend.{$this->userauth->id},ConfirmRemoveFriend" => 'confirmremovefriend',
            "echo-private:confirm-add-friend.{$this->userauth->id},ConfirmAddFriend" => 'confirmaddfriend',
        ];
    }

    public function friendrequest($data)
    {
        $this->username = $data['username'];
        $this->id = $data['id'];
        $this->showfriendnotification = true;
    }

    public function accept()
    {
        Friends::where('userrequest_id', $this->id)->where('userreceiver_id',Auth::id())->update(['accepted' => true]);
        session()->flash('friendaccepted', trans('You have accepted your friend request!'));
        $this->showfriendnotification = false;
        $this->user = User::find($this->id);
        event(new ConfirmAddFriend(Auth::user() , $this->user));
        $this->user = null;
    }

    public function deny()
    {
        Friends::where('userrequest_id', $this->id)->where('userreceiver_id',Auth::id())->update(['accepted' => false]);
        session()->flash('frienddeny', trans('You have denied your friend request!'));
        $this->showfriendnotification = false;
    }

        public function removefriend($data): void
        {
        $this->username = $data['username'];
        $this->id = $data['id'];
        $this->user = User::find($this->id);
        session()->flash('friendremoved', trans('Have supprimed you of friend list'));
        event(new ConfirmRemoveFriend(Auth::user() ,$this->user ));
        $this->user = null;
    }

    public function confirmremovefriend($data): void
    {
        $this->username = $data['user-requested'];
        session()->flash('friendconfirmremoved', trans("A bien etait supprimer des ami"));
    }

       public function confirmaddfriend($data): void
    {
        $this->username = $data['user-requested'];
        session()->flash('friendconfirmadded', trans("A accepter la demande d'ami"));
    }

}
