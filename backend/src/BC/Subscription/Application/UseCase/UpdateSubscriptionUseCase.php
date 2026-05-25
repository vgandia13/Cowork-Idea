<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\DTO\SubscriptionUpdateDTO;
use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionUserIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionPlanIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStartDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionEndDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionAutoRenewalValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStatusValueObject;

class UpdateSubscriptionUseCase
{
    public function __construct(
        private readonly SubscriptionRepositoryPort $repository,
    ) {
    }

    public function execute(SubscriptionUpdateDTO $dto): Subscription
    {
        $existing = $this->repository->findById(
            new SubscriptionIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("Subscription with id {$dto->id} not found.");
        }

        $updated = new Subscription(
            new SubscriptionIdValueObject($dto->id),
            $dto->userId !== null ? new SubscriptionUserIdValueObject($dto->userId) : $existing->getUserId(),
            $dto->planId !== null ? new SubscriptionPlanIdValueObject($dto->planId) : $existing->getPlanId(),
            $dto->startDate !== null ? new SubscriptionStartDateValueObject($dto->startDate) : $existing->getStartDate(),
            $dto->endDate !== null ? new SubscriptionEndDateValueObject($dto->endDate) : $existing->getEndDate(),
            $dto->autoRenewal !== null ? new SubscriptionAutoRenewalValueObject($dto->autoRenewal) : $existing->getAutoRenewal(),
            $dto->status !== null ? new SubscriptionStatusValueObject($dto->status) : $existing->getStatus(),
        );

        return $this->repository->update($updated);
    }
}
