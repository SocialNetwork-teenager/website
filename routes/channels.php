<?php

use App\Events\AddFriend;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('add-friend.{friendId}', function (User $user, int $friendId) {
 if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});

Broadcast::channel('remove-friend.{friendId}', function (User $user, int $friendId) {
 if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});

Broadcast::channel('confirm-add-friend.{friendId}', function (User $user, int $friendId) {
 if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});

Broadcast::channel('confirm-remove-friend.{friendId}', function (User $user, int $friendId) {
 if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});

Broadcast::channel('app', function (User $user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('online', function ($user) {
    if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});

Broadcast::channel('private-message.{friendId}', function ($user, $friendId) {
    if (auth()->check()) {
        return $user->toArray();
    }
    return false;
});



