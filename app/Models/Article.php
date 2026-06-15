<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image_url',
        'category_id',
        'user_id',
        'is_featured',
        'status'
    ];
}