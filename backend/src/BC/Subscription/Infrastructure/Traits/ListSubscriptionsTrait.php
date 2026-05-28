<?php

namespace Src\BC\Subscription\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;

trait ListSubscriptionsTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return SubscriptionModel::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int
    {
        return SubscriptionModel::count();
    }
}
