<?php

namespace Src\BC\Space\Infrastructure\Traits;

use Src\BC\Space\Infrastructure\Models\SpaceModel;

trait DeleteSpaceTrait
{
    public function deleteFromModel(string $id): void
    {
        SpaceModel::destroy($id);
    }
}
