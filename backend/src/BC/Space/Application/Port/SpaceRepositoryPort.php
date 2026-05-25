<?php

namespace Src\BC\Space\Application\Port;

use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;

interface SpaceRepositoryPort
{
    public function create(Space $entity): Space;

    public function findById(SpaceIdValueObject $id): ?Space;

    public function update(Space $entity): Space;

    public function delete(SpaceIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;
}
