<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $with = ['icategory', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['icategory'] ?? false, fn($query, $icategory) =>
            $query->whereHas('icategory', fn ($query) =>
                $query->where('slug', $icategory)
            )
        );
    }

    public function icomments()
    {
        return $this->hasMany(Icomment::class);
    }

    public function icategory()
    {
        return $this->belongsTo(Icategory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
