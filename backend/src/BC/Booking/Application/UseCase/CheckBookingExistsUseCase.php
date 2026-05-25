<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;

class CheckBookingExistsUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): bool
    {
        return $this->repository->findById(
            new BookingIdValueObject($id)
        ) !== null;
    }
}
