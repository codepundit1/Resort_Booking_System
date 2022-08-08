<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'checkin',
        'checkout',
    ];

    public function resort()
    {
        return $this->belongsTo(Resort::class, 'foreign_key', 'local_key');
    }
}
