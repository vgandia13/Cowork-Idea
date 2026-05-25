<?php

namespace Src\BC\Booking\Application\Port;

use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;

interface BookingRepositoryPort
{
    public function create(Booking $entity): Booking;

    public function findById(BookingIdValueObject $id): ?Booking;

    public function update(Booking $entity): Booking;

    public function delete(BookingIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;

    public function findByBookingCode(string $bookingCode): ?Booking;

    public function findByUserId(string $userId): array;

    public function findBySpaceId(string $spaceId): array;
}
