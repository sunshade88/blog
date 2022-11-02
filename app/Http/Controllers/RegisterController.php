<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:3|max:100|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required||max:255|min:7',
        ]);
        // dd('validation sucessful');


        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success', 'Your account has been created.');

        return redirect('/')->with('success', 'Your account has been created.');
    }
}