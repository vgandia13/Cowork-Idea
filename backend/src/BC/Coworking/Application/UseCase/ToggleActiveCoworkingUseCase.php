<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingNameValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingSlugValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingAddressValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCityValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCountryValueObject;
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

class ToggleActiveCoworkingUseCase
{
    public function __construct(
        private readonly CoworkingRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): Coworking
    {
        $existing = $this->repository->findById(
            new CoworkingIdValueObject($id)
        );

        if (!$existing) {
            throw new \RuntimeException("Coworking with id {$id} not found.");
        }

        $updated = new Coworking(
            new CoworkingIdValueObject($id),
            $existing->getName(),
            $existing->getSlug(),
            $existing->getAddress(),
            $existing->getCity(),
            $existing->getCountry(),
            $existing->getPostalCode(),
            $existing->getPhone(),
            $existing->getEmail(),
            $existing->getSchedule(),
            $existing->getDescription(),
            $existing->getLatitude(),
            $existing->getLongitude(),
            $existing->getCover(),
            $existing->getGallery(),
            new CoworkingActiveValueObject(!$existing->getActiveValue()),
        );

        return $this->repository->update($updated);
    }
}
