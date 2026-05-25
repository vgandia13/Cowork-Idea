<?php

namespace Src\BC\Booking\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'space_id',
        'start_date',
        'end_date',
        'created_at',
        'total',
        'status',
        'notes',
        'booking_code',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'total' => 'float',
    ];
}
