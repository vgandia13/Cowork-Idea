<?php

namespace Src\BC\Coworking\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class CoworkingModel extends Model
{
    protected $table = 'coworkings';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'address',
        'city',
        'postal_code',
        'phone',
        'email',
        'schedule',
        'description',
        'latitude',
        'longitude',
        'cover',
        'gallery',
        'active',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'gallery' => 'array',
        'active' => 'boolean',
    ];
}
