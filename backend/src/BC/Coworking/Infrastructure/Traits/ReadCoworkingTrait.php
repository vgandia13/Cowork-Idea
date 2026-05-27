<?php

namespace Src\BC\Coworking\Infrastructure\Traits;

use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

trait ReadCoworkingTrait
{
    public function findByIdFromModel(string $id): ?CoworkingModel
    {
        return CoworkingModel::with('amenities')->find($id);
    }
}
