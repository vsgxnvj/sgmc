<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'sites', 'amount', 'img_recibo', 'date_processed'];

    protected $casts = [
    'date_processed' => 'date',  // or 'datetime' if you want time too
    'is_active' => 'boolean',
];
}