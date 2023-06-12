<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    public function index()
    {
        return view('images.index', [
            'images' => Image::latest()->filter(
                        request(['search', 'icategory', 'author'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Image $image)
    {
        return view('images.show', [
            'image' => $image
        ]);
    }
}
