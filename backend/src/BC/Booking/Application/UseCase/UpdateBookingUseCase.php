<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\DTO\BookingUpdateDTO;
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

class UpdateBookingUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(BookingUpdateDTO $dto): Booking
    {
        $existing = $this->repository->findById(
            new BookingIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("Booking with id {$dto->id} not found.");
        }

        $updated = new Booking(
            new BookingIdValueObject($dto->id),
            $dto->userId !== null ? new BookingUserIdValueObject($dto->userId) : $existing->getUserId(),
            $dto->spaceId !== null ? new BookingSpaceIdValueObject($dto->spaceId) : $existing->getSpaceId(),
            $dto->startDate !== null ? new BookingStartDateValueObject($dto->startDate) : $existing->getStartDate(),
            $dto->endDate !== null ? new BookingEndDateValueObject($dto->endDate) : $existing->getEndDate(),
            $dto->createdAt !== null ? new BookingCreatedAtValueObject($dto->createdAt) : $existing->getCreatedAt(),
            $dto->total !== null ? new BookingTotalValueObject($dto->total) : $existing->getTotal(),
            $dto->status !== null ? new BookingStatusValueObject($dto->status) : $existing->getStatus(),
            $dto->notes !== null ? new BookingNotesValueObject($dto->notes) : $existing->getNotes(),
            $dto->bookingCode !== null ? new BookingBookingCodeValueObject($dto->bookingCode) : $existing->getBookingCode(),
        );

        return $this->repository->update($updated);
    }
}
