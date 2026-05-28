<?php

namespace Src\BC\Coworking\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

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

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(AmenityModel::class, 'coworking_amenity', 'coworking_id', 'amenity_id');
    }
}
