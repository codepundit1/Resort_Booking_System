<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;

    protected $table = 'resorts';
    protected $fillable = [
        'name',
        'image',
        'price',
        'location',
        'description',
    ];
}
