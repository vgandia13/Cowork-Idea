<?php

namespace Src\BC\Plan\Infrastructure\Traits;

use Src\BC\Plan\Infrastructure\Models\PlanModel;

trait ReadPlanTrait
{
    public function findByIdFromModel(string $id): ?PlanModel
    {
        return PlanModel::find($id);
    }
}
