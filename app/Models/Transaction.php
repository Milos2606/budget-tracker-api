<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'category',
        'amount',
        'type',
        'date',
    ];

    protected $casts = [
        'amount' => 'integer',
        'date' => 'date:Y-m-d',
    ];
}