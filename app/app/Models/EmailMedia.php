<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailMedia extends Model
{
    protected $table = 'email_media';

    protected $fillable = [
        'folder',
        'filename',
        'path',
        'mime_type',
        'size',
    ];
}