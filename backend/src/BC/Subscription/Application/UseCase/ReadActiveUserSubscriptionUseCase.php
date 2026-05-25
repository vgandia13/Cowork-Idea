<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;

class ReadActiveUserSubscriptionUseCase
{
    public function __construct(
        private readonly SubscriptionRepositoryPort $repository,
    ) {
    }

    public function execute(string $userId): ?Subscription
    {
        return $this->repository->findActiveByUserId($userId);
    }
}
