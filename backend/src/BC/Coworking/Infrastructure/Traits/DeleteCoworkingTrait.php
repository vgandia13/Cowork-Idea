<?php

namespace Src\BC\Coworking\Infrastructure\Traits;

use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

trait DeleteCoworkingTrait
{
    public function deleteFromModel(string $id): void
    {
        CoworkingModel::destroy($id);
    }
}
