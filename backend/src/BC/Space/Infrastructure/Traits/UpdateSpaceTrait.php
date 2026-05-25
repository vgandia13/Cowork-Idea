<?php

namespace Src\BC\Space\Infrastructure\Traits;

use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Infrastructure\Models\SpaceModel;

trait UpdateSpaceTrait
{
    public function updateFromModel(Space $entity, SpaceModel $model): void
    {
        $model->coworking_id = $entity->getCoworkingIdValue();
        $model->name = $entity->getNameValue();
        $model->slug = $entity->getSlugValue();
        $model->type = $entity->getTypeValue();
        $model->description = $entity->getDescriptionValue();
        $model->capacity = $entity->getCapacityValue();
        $model->price_hour = $entity->getPriceHourValue();
        $model->price_day = $entity->getPriceDayValue();
        $model->price_month = $entity->getPriceMonthValue();
        $model->size_m2 = $entity->getSizeM2Value();
        $model->available = $entity->getAvailableValue();
        $model->status = $entity->getStatusValue();
        $model->save();
    }
}
