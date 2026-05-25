<?php

namespace Src\BC\Plan\Infrastructure\Traits;

use Src\BC\Plan\Infrastructure\Models\PlanModel;

trait DeletePlanTrait
{
    public function deleteFromModel(string $id): void
    {
        PlanModel::destroy($id);
    }
}
