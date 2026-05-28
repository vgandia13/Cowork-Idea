<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionUserIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionPlanIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStartDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionEndDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionAutoRenewalValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStatusValueObject;

class ToggleStatusSubscriptionUseCase {

    public function __construct( private readonly SubscriptionRepositoryPort $repository) {}

    public function execute(string $id): Subscription {
        $existing = $this->repository->findById(
            new SubscriptionIdValueObject($id)
        );

        if (!$existing) {
            throw new \RuntimeException("La suscripcion con el id {$id} no existe");
        }

        $newStatus = $existing->getStatusValue() === 'active' ? 'inactive' : 'active';

        $updated = new Subscription(
            new SubscriptionIdValueObject($id),
            $existing->getUserId(),
            $existing->getPlanId(),
            $existing->getStartDate(),
            $existing->getEndDate(),
            $existing->getAutoRenewal(),
            new SubscriptionStatusValueObject($newStatus),
        );

        return $this->repository->update($updated);
    }
}
