<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;

class ReadBookingUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): ?Booking
    {
        return $this->repository->findById(
            new BookingIdValueObject($id)
        );
    }
}
