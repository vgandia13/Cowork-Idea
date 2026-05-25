<?php

namespace Src\BC\Amenity\Application\UseCase;

use Src\BC\Amenity\Application\DTO\AmenityUpdateDTO;
use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityNameValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIconValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityDescriptionValueObject;

class UpdateAmenityUseCase
{
    public function __construct(
        private readonly AmenityRepositoryPort $repository,
    ) {
    }

    public function execute(AmenityUpdateDTO $dto): Amenity
    {
        $existing = $this->repository->findById(
            new AmenityIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("Amenity with id {$dto->id} not found.");
        }

        $updated = new Amenity(
            new AmenityIdValueObject($dto->id),
            $dto->name !== null ? new AmenityNameValueObject($dto->name) : $existing->getName(),
            $dto->icon !== null ? new AmenityIconValueObject($dto->icon) : $existing->getIcon(),
            $dto->description !== null ? new AmenityDescriptionValueObject($dto->description) : $existing->getDescription(),
        );

        return $this->repository->update($updated);
    }
}
