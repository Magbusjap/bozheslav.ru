<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
