<?php

namespace Src\BC\Amenity\Infrastructure\Traits;

use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

trait UpdateAmenityTrait
{
    public function updateFromModel(Amenity $entity, AmenityModel $model): void
    {
        $model->name = $entity->getNameValue();
        $model->icon = $entity->getIconValue();
        $model->description = $entity->getDescriptionValue();
        $model->save();
    }
}
