<?php

namespace Src\BC\Coworking\Infrastructure\Traits;

use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

trait UpdateCoworkingTrait
{
    public function updateFromModel(Coworking $entity, CoworkingModel $model): void
    {
        $model->name = $entity->getNameValue();
        $model->slug = $entity->getSlugValue();
        $model->address = $entity->getAddressValue();
        $model->city = $entity->getCityValue();
        $model->country = $entity->getCountryValue();
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
