<?php

namespace Src\BC\Subscription\Infrastructure\Traits;

use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;

trait DeleteSubscriptionTrait
{
    public function deleteFromModel(string $id): void
    {
        SubscriptionModel::destroy($id);
    }
}
