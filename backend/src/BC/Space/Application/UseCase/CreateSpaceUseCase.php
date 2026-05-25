<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\DTO\SpaceDTO;
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

class CreateSpaceUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
    ) {
    }

    public function execute(SpaceDTO $dto): Space
    {
        $space = new Space(
            SpaceIdValueObject::generate(),
            new SpaceCoworkingIdValueObject($dto->coworkingId),
            new SpaceNameValueObject($dto->name),
            new SpaceSlugValueObject($dto->slug),
            new SpaceTypeValueObject($dto->type),
            $dto->description !== null ? new SpaceDescriptionValueObject($dto->description) : null,
            new SpaceCapacityValueObject($dto->capacity),
            $dto->priceHour !== null ? new SpacePriceHourValueObject($dto->priceHour) : null,
            $dto->priceDay !== null ? new SpacePriceDayValueObject($dto->priceDay) : null,
            $dto->priceMonth !== null ? new SpacePriceMonthValueObject($dto->priceMonth) : null,
            $dto->sizeM2 !== null ? new SpaceSizeM2ValueObject($dto->sizeM2) : null,
            new SpaceAvailableValueObject($dto->available),
            new SpaceStatusValueObject($dto->status),
        );

        return $this->repository->create($space);
    }
}
