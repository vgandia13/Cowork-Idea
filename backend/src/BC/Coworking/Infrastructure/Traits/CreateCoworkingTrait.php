<?php

namespace Src\BC\Coworking\Infrastructure\Traits;

use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

trait CreateCoworkingTrait
{
    public function createFromModel(Coworking $entity, CoworkingModel $model): void
    {
        $model->id = $entity->getIdValue();
        $model->name = $entity->getNameValue();
        $model->slug = $entity->getSlugValue();
        $model->address = $entity->getAddressValue();
        $model->city = $entity->getCityValue();
        $model->postal_code = $entity->getPostalCodeValue();
        $model->phone = $entity->getPhoneValue();
        $model->email = $entity->getEmailValue();
        $model->schedule = $entity->getScheduleValue();
        $model->description = $entity->getDescriptionValue();
        $model->latitude = $entity->getLatitudeValue();
        $model->longitude = $entity->getLongitudeValue();
        $model->cover = $entity->getCoverValue();
        $model->gallery = $entity->getGalleryValue();
        $model->active = $entity->getActiveValue();
        $model->save();
    }
}
