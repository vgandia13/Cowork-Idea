<?php

namespace Src\BC\Space\Infrastructure\Traits;

use Src\BC\Space\Infrastructure\Models\SpaceModel;

trait ReadSpaceTrait
{
    public function findByIdFromModel(string $id): ?SpaceModel
    {
        return SpaceModel::with('amenities')->find($id);
    }
}
