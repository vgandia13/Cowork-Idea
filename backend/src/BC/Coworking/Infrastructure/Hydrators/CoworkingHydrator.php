<?php

namespace Src\BC\Coworking\Infrastructure\Hydrators;

use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingNameValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingSlugValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingAddressValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCityValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPostalCodeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPhoneValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingEmailValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingScheduleValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingDescriptionValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLatitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLongitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCoverValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingGalleryValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingActiveValueObject;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

class CoworkingHydrator
{
    public static function toEntity(CoworkingModel $model): Coworking
    {
        $entity = new Coworking(
            new CoworkingIdValueObject($model->id),
            new CoworkingNameValueObject($model->name),
            new CoworkingSlugValueObject($model->slug),
            new CoworkingAddressValueObject($model->address),
            new CoworkingCityValueObject($model->city),
            new CoworkingPostalCodeValueObject($model->postal_code),
            $model->phone ? new CoworkingPhoneValueObject($model->phone) : null,
            $model->email ? new CoworkingEmailValueObject($model->email) : null,
            $model->schedule ? new CoworkingScheduleValueObject($model->schedule) : null,
            $model->description ? new CoworkingDescriptionValueObject($model->description) : null,
            $model->latitude ? new CoworkingLatitudeValueObject($model->latitude) : null,
            $model->longitude ? new CoworkingLongitudeValueObject($model->longitude) : null,
            $model->cover ? new CoworkingCoverValueObject($model->cover) : null,
            $model->gallery ? new CoworkingGalleryValueObject($model->gallery) : null,
            new CoworkingActiveValueObject($model->active),
        );

        if ($model->relationLoaded('amenities')) {
            $entity->setAmenities(
                $model->amenities->map(fn ($a) => [
                    'id' => $a->id,
                    'name' => $a->name,
                    'icon' => $a->icon,
                    'description' => $a->description,
                ])->toArray()
            );
        }

        return $entity;
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (CoworkingModel $model) => self::toEntity($model))->toArray();
    }
}
