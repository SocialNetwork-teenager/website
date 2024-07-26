<?php

namespace App\Http\Controllers;


use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users');
        }else{
            return view('user.show', ['user' => $user]);
        }
    }
}
