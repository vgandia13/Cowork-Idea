<?php

namespace Src\BC\Coworking\Application\Port;

use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;

interface CoworkingRepositoryPort
{
    public function create(Coworking $entity): Coworking;

    public function findById(CoworkingIdValueObject $id): ?Coworking;

    public function update(Coworking $entity): Coworking;

    public function delete(CoworkingIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;

    public function findBySlug(string $slug): ?Coworking;
}
