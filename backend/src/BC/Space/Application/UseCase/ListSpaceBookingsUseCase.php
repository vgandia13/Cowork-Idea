<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;

class ListSpaceBookingsUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $bookingRepository,
    ) {
    }

    public function execute(string $spaceId): array
    {
        return $this->bookingRepository->findBySpaceId($spaceId);
    }
}
