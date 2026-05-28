<?php

namespace Src\BC\Plan\Infrastructure\Traits;

use Src\BC\Plan\Domain\Entities\Plan;
use Src\BC\Plan\Infrastructure\Models\PlanModel;

trait UpdatePlanTrait
{
    public function updateFromModel(Plan $entity, PlanModel $model): void
    {
        $model->name = $entity->getNameValue();
        $model->description = $entity->getDescriptionValue();
        $model->price = $entity->getPriceValue();
        $model->duration = $entity->getDurationValue();
        $model->credits = $entity->getCreditsValue();
        $model->meeting_hours = $entity->getMeetingHoursValue();
        $model->access247 = $entity->getAccess247Value();
        $model->active = $entity->getActiveValue();
        $model->save();
    }
}
