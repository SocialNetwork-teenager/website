<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AddFriend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;

    private User $usersender;
    /**
     * Create a new event instance.
     */
    public function __construct( User $user , User $usersender)
    {
        $this->user = $user;
        $this->usersender = $usersender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('add-friend.'.$this->user->id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->usersender->id,
            'username' => $this->usersender->name,
        ];
    }

}
