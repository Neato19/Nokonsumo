<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Validation\Rule;

class AdminImageController extends Controller
{
    public function index()
    {
        return view('images.index', [
            'images' => Image::latest()->filter(
                        request(['search', 'icategory', 'author'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store()
    {
        Image::create(array_merge($this->validateImage(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('image');
    }

    public function edit(Image $image)
    {
        return view('admin.images.edit', ['image' => $image]);
    }

    public function update(Image $image)
    {
        $attributes = $this->validateImage($image);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $image->update($attributes);

        return back()->with('success', 'Imagen modificada correctamente');
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return back()->with('success', 'Imagen borrada correctamente');
    }

    protected function validateImage(?Image $image = null): array
    {
        $image ??= new Image();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $image->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('images', 'slug')->ignore($image)],
            'body' => 'required',
            'icategory_id' => ['required', Rule::exists('icategories', 'id')]
        ]);
    }
}
