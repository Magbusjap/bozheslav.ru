<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'status',
        'category_id',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
