<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteAccount extends Model
{
     protected $fillable = [
        'user_id', 'username', 'site', 'is_pending_for_approval'
    ];
}
