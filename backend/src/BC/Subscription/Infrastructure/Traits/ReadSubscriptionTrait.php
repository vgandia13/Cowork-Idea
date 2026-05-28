<?php

namespace Src\BC\Subscription\Infrastructure\Traits;

use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;

trait ReadSubscriptionTrait
{
    public function findByIdFromModel(string $id): ?SubscriptionModel
    {
        return SubscriptionModel::find($id);
    }
}
