<?php

namespace Src\BC\Amenity\Application\UseCase;

use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;

class ReadAmenityUseCase
{
    public function __construct(
        private readonly AmenityRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): ?Amenity
    {
        return $this->repository->findById(
            new AmenityIdValueObject($id)
        );
    }
}
