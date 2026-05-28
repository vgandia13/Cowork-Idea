<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;

class ReadSubscriptionUseCase
{
    public function __construct(private readonly SubscriptionRepositoryPort $repository) {}

    public function execute(string $id): ?Subscription {
        return $this->repository->findById(
            new SubscriptionIdValueObject($id)
        );
    }
}
