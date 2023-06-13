<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function map()
    {
        return view('components.map');
    }

    public function treat()
    {
        return view('components.info-treat');
    }

    public function social()
    {
        return view('components.social');
    }
}
