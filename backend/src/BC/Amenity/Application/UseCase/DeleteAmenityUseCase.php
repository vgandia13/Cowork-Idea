<?php

namespace Src\BC\Amenity\Application\UseCase;

use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;

class DeleteAmenityUseCase
{
    public function __construct(
        private readonly AmenityRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): void
    {
        $this->repository->delete(
            new AmenityIdValueObject($id)
        );
    }
}
