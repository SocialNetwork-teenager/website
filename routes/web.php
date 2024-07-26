<?php

use App\Http\Controllers\UserController;
use App\Livewire\UserShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/user/{user}',[UserController::class,'show'])->name('users.show');
    Route::get('/friends',[\App\Http\Controllers\FriendController::class,'index'])->name('friends');
    Route::get('/friends/{user}',[\App\Http\Controllers\FriendController::class,'show'])->name('friends.show');
});
