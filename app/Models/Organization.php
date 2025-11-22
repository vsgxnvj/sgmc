<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name', 'logo', 'url', 'same_as',
        'telephone', 'contact_type', 'area_served', 'language'
    ];

     protected $casts = [
        'same_as' => 'array', // automatically converts JSON to array
    ];
}
