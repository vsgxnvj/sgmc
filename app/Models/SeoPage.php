<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
       protected $fillable = [
        'title',
        'meta_description',
        'slug',
        'focus_keywords',
        'secondary_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'h1',
        'full_description',
        'faq_schema',
        'json_ld',
        'gallery',
        'video',
        'alt_texts',
        'registration_type',
        'cashin_method',
        'cashout_method',
        'link',
        'category',
        'plasada',
        'agent_contact_link',
    ];

     protected $casts = [
        'gallery' => 'array',
        'alt_texts' => 'array',
    ];
}
