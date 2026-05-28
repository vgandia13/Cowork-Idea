<?php

namespace Src\BC\Booking\Application\UseCase;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;

class ListUserBookingsUseCase
{
    public function __construct(private readonly BookingRepositoryPort $repository) {}

    public function execute(string $userId): array{
        return $this->repository->findByUserId($userId);
    }
}
