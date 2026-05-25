<?php

namespace Src\BC\Amenity\Application\Port;

use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;

interface AmenityRepositoryPort
{
    public function create(Amenity $entity): Amenity;

    public function findById(AmenityIdValueObject $id): ?Amenity;

    public function update(Amenity $entity): Amenity;

    public function delete(AmenityIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;
}
