<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatedData extends Model
{
    use HasFactory;

    protected $casts = [
        'operation' => 'json'
    ];

    protected $fillable = [
        'operation', 'result'
    ];
}
