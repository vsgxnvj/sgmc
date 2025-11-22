<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $fillable = [
        'title',
        'slug',
        'author',
        'category',
        'tags',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
    ];


      // For route model binding with slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
