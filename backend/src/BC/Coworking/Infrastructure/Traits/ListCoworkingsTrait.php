<?php

namespace Src\BC\Coworking\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

trait ListCoworkingsTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return CoworkingModel::with('amenities')->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return CoworkingModel::count();
    }
}
