<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;

class DeleteSubscriptionUseCase
{
    public function __construct(private readonly SubscriptionRepositoryPort $repository) {}

    public function execute(string $id): void {
        $this->repository->delete(
            new SubscriptionIdValueObject($id)
        );
    }
}
