<?php

namespace Src\BC\Amenity\Application\UseCase;

use Src\BC\Amenity\Application\DTO\AmenityDTO;
use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityNameValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIconValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityDescriptionValueObject;

class CreateAmenityUseCase
{
    public function __construct(private readonly AmenityRepositoryPort $repository) {}

    public function execute(AmenityDTO $dto): Amenity {
        $amenity = new Amenity(AmenityIdValueObject::generate(),new AmenityNameValueObject($dto->name),$dto->icon !== null ? new AmenityIconValueObject($dto->icon) : null,
            $dto->description !== null ? new AmenityDescriptionValueObject($dto->description) : null);

        return $this->repository->create($amenity);
    }
}
