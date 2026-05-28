<?php

namespace Src\BC\Amenity\Infrastructure\Hydrators;

use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityNameValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIconValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityDescriptionValueObject;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

class AmenityHydrator
{
    public static function toEntity(AmenityModel $model): Amenity
    {
        return new Amenity(
            new AmenityIdValueObject($model->id),
            new AmenityNameValueObject($model->name),
            $model->icon ? new AmenityIconValueObject($model->icon) : null,
            $model->description ? new AmenityDescriptionValueObject($model->description) : null,
        );
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (AmenityModel $model) => self::toEntity($model))->toArray();
    }
}
