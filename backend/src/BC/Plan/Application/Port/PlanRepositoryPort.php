<?php

namespace Src\BC\Plan\Application\Port;

use Src\BC\Plan\Domain\Entities\Plan;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;

interface PlanRepositoryPort
{
    public function create(Plan $entity): Plan;

    public function findById(PlanIdValueObject $id): ?Plan;

    public function update(Plan $entity): Plan;

    public function delete(PlanIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;
}
