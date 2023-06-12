<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Las credenciales no han podido ser verificadas.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Bienvenido de vuelta');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', '¡Hasta luego!');
    }
}
