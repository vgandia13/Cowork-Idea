<?php

namespace Src\BC\Booking\Application\DTO;

class BookingDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $userId,
        public readonly string $spaceId,
        public readonly string $startDate,
        public readonly string $endDate,
        public readonly string $createdAt,
        public readonly float $total,
        public readonly string $status = 'pending',
        public readonly ?string $notes,
        public readonly string $bookingCode,
    ) {
    }
}
