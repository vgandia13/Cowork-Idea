<?php

namespace Src\BC\Space\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class SpaceModel extends Model
{
    protected $table = 'spaces';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'coworking_id',
        'name',
        'slug',
        'type',
        'description',
        'capacity',
        'price_hour',
        'price_day',
        'price_month',
        'size_m2',
        'available',
        'status',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'price_hour' => 'float',
        'price_day' => 'float',
        'price_month' => 'float',
        'size_m2' => 'float',
        'available' => 'boolean',
    ];
}
