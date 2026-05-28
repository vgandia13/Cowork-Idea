<?php

namespace Src\BC\User\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\User\Infrastructure\Models\UserModel;

trait ListUsersTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return UserModel::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return UserModel::count();
    }
}
