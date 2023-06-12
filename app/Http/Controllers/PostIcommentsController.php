<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class PostIcommentsController extends Controller
{
    public function store(Image $image)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $image->icomments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
    
}
