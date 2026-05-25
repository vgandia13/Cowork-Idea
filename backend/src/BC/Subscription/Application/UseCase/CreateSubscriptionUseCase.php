<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\DTO\SubscriptionDTO;
use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionUserIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionPlanIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStartDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionEndDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionAutoRenewalValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStatusValueObject;

class CreateSubscriptionUseCase
{
    public function __construct(
        private readonly SubscriptionRepositoryPort $repository,
    ) {
    }

    public function execute(SubscriptionDTO $dto): Subscription
    {
        $subscription = new Subscription(
            SubscriptionIdValueObject::generate(),
            new SubscriptionUserIdValueObject($dto->userId),
            new SubscriptionPlanIdValueObject($dto->planId),
            new SubscriptionStartDateValueObject($dto->startDate),
            $dto->endDate !== null ? new SubscriptionEndDateValueObject($dto->endDate) : null,
            new SubscriptionAutoRenewalValueObject($dto->autoRenewal),
            new SubscriptionStatusValueObject($dto->status),
        );

        return $this->repository->create($subscription);
    }
}
