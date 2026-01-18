<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'description',
        'location',
        'frequency',
        'is_anonymous',
        'status',
        'image_path',
        'video_path',
        'document_path',
    ];
}
