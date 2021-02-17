<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => ['email', 'unique:users'],
            'password' => ['min:6']
        ]);

        $user = \App\User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=> Hash::make($request->password),
        ]);

        return response()->json(['user' => $user]);
    }
}