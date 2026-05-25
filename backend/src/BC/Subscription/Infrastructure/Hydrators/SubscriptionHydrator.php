<?php

namespace Src\BC\Subscription\Infrastructure\Hydrators;

use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionUserIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionPlanIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStartDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionEndDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionAutoRenewalValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStatusValueObject;
use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;

class SubscriptionHydrator
{
    public static function toEntity(SubscriptionModel $model): Subscription
    {
        return new Subscription(
            new SubscriptionIdValueObject($model->id),
            new SubscriptionUserIdValueObject($model->user_id),
            new SubscriptionPlanIdValueObject($model->plan_id),
            new SubscriptionStartDateValueObject($model->start_date),
            $model->end_date ? new SubscriptionEndDateValueObject($model->end_date) : null,
            new SubscriptionAutoRenewalValueObject($model->auto_renewal),
            new SubscriptionStatusValueObject($model->status),
        );
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (SubscriptionModel $model) => self::toEntity($model))->toArray();
    }
}
