<?php

namespace Src\BC\Amenity\Infrastructure\Traits;

use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

trait CreateAmenityTrait
{
    public function createFromModel(Amenity $entity, AmenityModel $model): void
    {
        $model->id = $entity->getIdValue();
        $model->name = $entity->getNameValue();
        $model->icon = $entity->getIconValue();
        $model->description = $entity->getDescriptionValue();
        $model->save();
    }
}
