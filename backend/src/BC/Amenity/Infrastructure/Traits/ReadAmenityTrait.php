<?php

namespace Src\BC\Amenity\Infrastructure\Traits;

use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

trait ReadAmenityTrait
{
    public function findByIdFromModel(string $id): ?AmenityModel
    {
        return AmenityModel::find($id);
    }
}
