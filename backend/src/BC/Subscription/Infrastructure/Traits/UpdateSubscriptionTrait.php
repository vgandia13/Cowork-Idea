<?php

namespace Src\BC\Subscription\Infrastructure\Traits;

use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;

trait UpdateSubscriptionTrait
{
    public function updateFromModel(Subscription $entity, SubscriptionModel $model): void
    {
        $model->user_id = $entity->getUserIdValue();
        $model->plan_id = $entity->getPlanIdValue();
        $model->start_date = $entity->getStartDateValue();
        $model->end_date = $entity->getEndDateValue();
        $model->auto_renewal = $entity->getAutoRenewalValue();
        $model->status = $entity->getStatusValue();
        $model->save();
    }
}
