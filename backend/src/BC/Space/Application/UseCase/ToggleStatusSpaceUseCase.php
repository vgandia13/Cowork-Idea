<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCoworkingIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceNameValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSlugValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceTypeValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceDescriptionValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCapacityValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceHourValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceDayValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceMonthValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSizeM2ValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceAvailableValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceStatusValueObject;

class ToggleStatusSpaceUseCase
{
    public function __construct(private readonly SpaceRepositoryPort $repository) {}

    public function execute(string $id): Space {
        $existing = $this->repository->findById(
            new SpaceIdValueObject($id)
        );

        if (!$existing) {
            throw new \RuntimeException("El espacio con el id {$id} no existe ");
        }

        $newStatus = $existing->getStatusValue() === 'active' ? 'inactive' : 'active';

        $updated = new Space(
            new SpaceIdValueObject($id),
            $existing->getCoworkingId(),
            $existing->getName(),
            $existing->getSlug(),
            $existing->getType(),
            $existing->getDescription(),
            $existing->getCapacity(),
            $existing->getPriceHour(),
            $existing->getPriceDay(),
            $existing->getPriceMonth(),
            $existing->getSizeM2(),
            $existing->getAvailable(),
            new SpaceStatusValueObject($newStatus),
        );

        return $this->repository->update($updated);
    }
}
