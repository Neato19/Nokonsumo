<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'telephone' => 'required|min:9|max:9|unique:users,telephone',
            'password' => 'required|min:7|max:255',
        ]);

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Tu cuenta se ha creado correctamente.');
    }
}
