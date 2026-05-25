<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\DTO\BookingDTO;
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

class CreateBookingUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(BookingDTO $dto): Booking
    {
        $booking = new Booking(
            BookingIdValueObject::generate(),
            new BookingUserIdValueObject($dto->userId),
            new BookingSpaceIdValueObject($dto->spaceId),
            new BookingStartDateValueObject($dto->startDate),
            new BookingEndDateValueObject($dto->endDate),
            new BookingCreatedAtValueObject($dto->createdAt),
            new BookingTotalValueObject($dto->total),
            new BookingStatusValueObject($dto->status),
            $dto->notes !== null ? new BookingNotesValueObject($dto->notes) : null,
            new BookingBookingCodeValueObject($dto->bookingCode),
        );

        return $this->repository->create($booking);
    }
}
