<?php

namespace Src\BC\Space\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Space\Infrastructure\Models\SpaceModel;

trait ListSpacesTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return SpaceModel::with('amenities')->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return SpaceModel::count();
    }
}
