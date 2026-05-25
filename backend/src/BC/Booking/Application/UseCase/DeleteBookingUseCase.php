<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;

class DeleteBookingUseCase
{
    public function __construct(
        private readonly BookingRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): void
    {
        $this->repository->delete(
            new BookingIdValueObject($id)
        );
    }
}
