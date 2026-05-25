<?php

namespace Src\BC\Amenity\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class AmenityModel extends Model
{
    protected $table = 'amenities';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'icon',
        'description',
    ];

    protected $casts = [
    ];
}
