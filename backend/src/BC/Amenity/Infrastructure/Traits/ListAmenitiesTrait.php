<?php

namespace Src\BC\Amenity\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

trait ListAmenitiesTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return AmenityModel::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return AmenityModel::count();
    }
}
