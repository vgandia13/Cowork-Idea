<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;

class ReadBookingByCodeUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(string $bookingCode): ?Booking
    {
        return $this->repository->findByBookingCode($bookingCode);
    }
}
