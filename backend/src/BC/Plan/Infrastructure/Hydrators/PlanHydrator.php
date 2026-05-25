<?php

namespace Src\BC\Plan\Infrastructure\Hydrators;

use Src\BC\Plan\Domain\Entities\Plan;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanNameValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDescriptionValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanPriceValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDurationValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanCreditsValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanMeetingHoursValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanAccess247ValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanActiveValueObject;
use Src\BC\Plan\Infrastructure\Models\PlanModel;

class PlanHydrator
{
    public static function toEntity(PlanModel $model): Plan
    {
        return new Plan(
            new PlanIdValueObject($model->id),
            new PlanNameValueObject($model->name),
            $model->description ? new PlanDescriptionValueObject($model->description) : null,
            new PlanPriceValueObject($model->price),
            new PlanDurationValueObject($model->duration),
            new PlanCreditsValueObject($model->credits),
            new PlanMeetingHoursValueObject($model->meeting_hours),
            new PlanAccess247ValueObject($model->access247),
            new PlanActiveValueObject($model->active),
        );
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (PlanModel $model) => self::toEntity($model))->toArray();
    }
}
