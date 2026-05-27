<?php

namespace Src\BC\Space\Infrastructure\Hydrators;

use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCoworkingIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceNameValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSlugValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceTypeValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceDescriptionValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCapacityValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceHourValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceDayValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceMonthValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSizeM2ValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceAvailableValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceStatusValueObject;
use Src\BC\Space\Infrastructure\Models\SpaceModel;

class SpaceHydrator
{
    public static function toEntity(SpaceModel $model): Space
    {
        $entity = new Space(
            new SpaceIdValueObject($model->id),
            new SpaceCoworkingIdValueObject($model->coworking_id),
            new SpaceNameValueObject($model->name),
            new SpaceSlugValueObject($model->slug),
            new SpaceTypeValueObject($model->type),
            $model->description ? new SpaceDescriptionValueObject($model->description) : null,
            new SpaceCapacityValueObject($model->capacity),
            $model->price_hour ? new SpacePriceHourValueObject($model->price_hour) : null,
            $model->price_day ? new SpacePriceDayValueObject($model->price_day) : null,
            $model->price_month ? new SpacePriceMonthValueObject($model->price_month) : null,
            $model->size_m2 ? new SpaceSizeM2ValueObject($model->size_m2) : null,
            new SpaceAvailableValueObject($model->available),
            new SpaceStatusValueObject($model->status),
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
        return $items->map(fn (SpaceModel $model) => self::toEntity($model))->toArray();
    }
}
