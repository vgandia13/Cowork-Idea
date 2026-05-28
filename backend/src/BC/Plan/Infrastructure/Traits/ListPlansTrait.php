<?php

namespace Src\BC\Plan\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Plan\Infrastructure\Models\PlanModel;

trait ListPlansTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return PlanModel::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return PlanModel::count();
    }
}
