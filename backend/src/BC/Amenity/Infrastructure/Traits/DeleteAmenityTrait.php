<?php

namespace Src\BC\Amenity\Infrastructure\Traits;

use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

trait DeleteAmenityTrait
{
    public function deleteFromModel(string $id): void
    {
        AmenityModel::destroy($id);
    }
}
