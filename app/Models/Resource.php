<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image_path',
        'video_path',
        'document_path',
        'category',
        'is_featured',
    ];
}
