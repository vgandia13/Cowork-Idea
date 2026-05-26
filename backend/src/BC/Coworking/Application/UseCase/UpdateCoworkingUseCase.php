<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\DTO\CoworkingUpdateDTO;
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

class UpdateCoworkingUseCase {

    public function __construct(private readonly CoworkingRepositoryPort $repository) {}

    public function execute(CoworkingUpdateDTO $dto): Coworking
    {
        $existing = $this->repository->findById(
            new CoworkingIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("El coworking con id {$dto->id} no existe");
        }

        $updated = new Coworking(
            new CoworkingIdValueObject($dto->id),
            $dto->name !== null ? new CoworkingNameValueObject($dto->name) : $existing->getName(),
            $dto->slug !== null ? new CoworkingSlugValueObject($dto->slug) : $existing->getSlug(),
            $dto->address !== null ? new CoworkingAddressValueObject($dto->address) : $existing->getAddress(),
            $dto->city !== null ? new CoworkingCityValueObject($dto->city) : $existing->getCity(),
            $dto->postalCode !== null ? new CoworkingPostalCodeValueObject($dto->postalCode) : $existing->getPostalCode(),
            $dto->phone !== null ? new CoworkingPhoneValueObject($dto->phone) : $existing->getPhone(),
            $dto->email !== null ? new CoworkingEmailValueObject($dto->email) : $existing->getEmail(),
            $dto->schedule !== null ? new CoworkingScheduleValueObject($dto->schedule) : $existing->getSchedule(),
            $dto->description !== null ? new CoworkingDescriptionValueObject($dto->description) : $existing->getDescription(),
            $dto->latitude !== null ? new CoworkingLatitudeValueObject($dto->latitude) : $existing->getLatitude(),
            $dto->longitude !== null ? new CoworkingLongitudeValueObject($dto->longitude) : $existing->getLongitude(),
            $dto->cover !== null ? new CoworkingCoverValueObject($dto->cover) : $existing->getCover(),
            $dto->gallery !== null ? new CoworkingGalleryValueObject($dto->gallery) : $existing->getGallery(),
            $dto->active !== null ? new CoworkingActiveValueObject($dto->active) : $existing->getActive(),
        );

        return $this->repository->update($updated);
    }
}
