<?php

namespace Src\BC\Subscription\Application\Port;

use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;

interface SubscriptionRepositoryPort
{
    public function create(Subscription $entity): Subscription;

    public function findById(SubscriptionIdValueObject $id): ?Subscription;

    public function update(Subscription $entity): Subscription;

    public function delete(SubscriptionIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;

    public function findByUserId(string $userId): array;

    public function findActiveByUserId(string $userId): ?Subscription;
}
