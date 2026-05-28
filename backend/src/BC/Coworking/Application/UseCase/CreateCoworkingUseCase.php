<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\DTO\CoworkingDTO;
use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingNameValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingSlugValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingAddressValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCityValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPostalCodeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPhoneValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingEmailValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingScheduleValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingDescriptionValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLatitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLongitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCoverValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingGalleryValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingActiveValueObject;

class CreateCoworkingUseCase
{
    public function __construct(
        private readonly CoworkingRepositoryPort $repository,
    ) {
    }

    public function execute(CoworkingDTO $dto): Coworking
    {
        $coworking = new Coworking(
            CoworkingIdValueObject::generate(),
            new CoworkingNameValueObject($dto->name),
            new CoworkingSlugValueObject($dto->slug),
            new CoworkingAddressValueObject($dto->address),
            new CoworkingCityValueObject($dto->city),
            new CoworkingPostalCodeValueObject($dto->postalCode),
            $dto->phone !== null ? new CoworkingPhoneValueObject($dto->phone) : null,
            $dto->email !== null ? new CoworkingEmailValueObject($dto->email) : null,
            $dto->schedule !== null ? new CoworkingScheduleValueObject($dto->schedule) : null,
            $dto->description !== null ? new CoworkingDescriptionValueObject($dto->description) : null,
            $dto->latitude !== null ? new CoworkingLatitudeValueObject($dto->latitude) : null,
            $dto->longitude !== null ? new CoworkingLongitudeValueObject($dto->longitude) : null,
            $dto->cover !== null ? new CoworkingCoverValueObject($dto->cover) : null,
            $dto->gallery !== null ? new CoworkingGalleryValueObject($dto->gallery) : null,
            new CoworkingActiveValueObject($dto->active),
        );

        return $this->repository->create($coworking);
    }
}
