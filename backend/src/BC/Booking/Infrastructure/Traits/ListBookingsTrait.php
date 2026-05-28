<?php

namespace Src\BC\Booking\Infrastructure\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Src\BC\Booking\Infrastructure\Models\BookingModel;

trait ListBookingsTrait
{
    public function findAllFromModel(int $page = 1, int $perPage = 15): LengthAwarePaginator {
        return BookingModel::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function countAllFromModel(): int {
        return BookingModel::count();
    }
}
