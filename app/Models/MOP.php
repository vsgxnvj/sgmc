<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOP extends Model
{

     use HasFactory;

         protected $table = 'mops'; // ✅ Add this line

      protected $fillable = [
        'account_name',
        'account_number',
        'type_of_account',
        'isactive',
        'image_logo',
        'image_qr',
    ];
}
