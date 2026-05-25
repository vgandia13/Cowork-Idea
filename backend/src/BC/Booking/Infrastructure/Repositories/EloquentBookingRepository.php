<?php

namespace Src\BC\Booking\Infrastructure\Repositories;

use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;
use Src\BC\Booking\Infrastructure\Hydrators\BookingHydrator;
use Src\BC\Booking\Infrastructure\Models\BookingModel;
use Src\BC\Booking\Infrastructure\Traits\CreateBookingTrait;
use Src\BC\Booking\Infrastructure\Traits\DeleteBookingTrait;
use Src\BC\Booking\Infrastructure\Traits\ListBookingsTrait;
use Src\BC\Booking\Infrastructure\Traits\ReadBookingTrait;
use Src\BC\Booking\Infrastructure\Traits\UpdateBookingTrait;

class EloquentBookingRepository implements BookingRepositoryPort
{
    use CreateBookingTrait;
    use ReadBookingTrait;
    use UpdateBookingTrait;
    use DeleteBookingTrait;
    use ListBookingsTrait;

    public function create(Booking $entity): Booking
    {
        $model = new BookingModel();
        $this->createFromModel($entity, $model);
        return BookingHydrator::toEntity($model->fresh());
    }

    public function findById(BookingIdValueObject $id): ?Booking
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return BookingHydrator::toEntity($model);
    }

    public function update(Booking $entity): Booking
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("Booking with id {$entity->getIdValue()} not found.");
        }
        $this->updateFromModel($entity, $model);
        return BookingHydrator::toEntity($model->fresh());
    }

    public function delete(BookingIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return BookingHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }
}
