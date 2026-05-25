<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\DTO\SpaceUpdateDTO;
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

class UpdateSpaceUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
    ) {
    }

    public function execute(SpaceUpdateDTO $dto): Space
    {
        $existing = $this->repository->findById(
            new SpaceIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("Space with id {$dto->id} not found.");
        }

        $updated = new Space(
            new SpaceIdValueObject($dto->id),
            $dto->coworkingId !== null ? new SpaceCoworkingIdValueObject($dto->coworkingId) : $existing->getCoworkingId(),
            $dto->name !== null ? new SpaceNameValueObject($dto->name) : $existing->getName(),
            $dto->slug !== null ? new SpaceSlugValueObject($dto->slug) : $existing->getSlug(),
            $dto->type !== null ? new SpaceTypeValueObject($dto->type) : $existing->getType(),
            $dto->description !== null ? new SpaceDescriptionValueObject($dto->description) : $existing->getDescription(),
            $dto->capacity !== null ? new SpaceCapacityValueObject($dto->capacity) : $existing->getCapacity(),
            $dto->priceHour !== null ? new SpacePriceHourValueObject($dto->priceHour) : $existing->getPriceHour(),
            $dto->priceDay !== null ? new SpacePriceDayValueObject($dto->priceDay) : $existing->getPriceDay(),
            $dto->priceMonth !== null ? new SpacePriceMonthValueObject($dto->priceMonth) : $existing->getPriceMonth(),
            $dto->sizeM2 !== null ? new SpaceSizeM2ValueObject($dto->sizeM2) : $existing->getSizeM2(),
            $dto->available !== null ? new SpaceAvailableValueObject($dto->available) : $existing->getAvailable(),
            $dto->status !== null ? new SpaceStatusValueObject($dto->status) : $existing->getStatus(),
        );

        return $this->repository->update($updated);
    }
}
