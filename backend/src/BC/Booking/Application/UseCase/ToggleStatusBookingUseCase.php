<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingUserIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingSpaceIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStartDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingEndDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingCreatedAtValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingTotalValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStatusValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingNotesValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingBookingCodeValueObject;

class ToggleStatusBookingUseCase
{
    public function __construct(private readonly BookingRepositoryPort $repository) {}

    public function execute(string $id): Booking {
        $existing = $this->repository->findById(new BookingIdValueObject($id));

        if (!$existing) {throw new \RuntimeException("El booking con el id {$id} no existe"); }

        $newStatus = $existing->getStatusValue() === 'active' ? 'inactive' : 'active';

        $updated = new Booking(
            new BookingIdValueObject($id),
            $existing->getUserId(),
            $existing->getSpaceId(),
            $existing->getStartDate(),
            $existing->getEndDate(),
            $existing->getCreatedAt(),
            $existing->getTotal(),
            new BookingStatusValueObject($newStatus),
            $existing->getNotes(),
            $existing->getBookingCode(),
        );

        return $this->repository->update($updated);
    }
}
