<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashinRequest extends Model
{
      protected $fillable = [
        'user_id',
        'username',
        'site',
        'amount',
        'mode_of_payment',
        'recipient',
        'receipt_img',
        'isprocess',
        'remarks',
    ];
}
