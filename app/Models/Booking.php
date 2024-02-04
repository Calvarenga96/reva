<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'start_time',
        'end_time',
        'status',
        'notes',
        'total_price',
        'is_paid',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
