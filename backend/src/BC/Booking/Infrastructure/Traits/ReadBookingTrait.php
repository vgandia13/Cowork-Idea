<?php

namespace Src\BC\Booking\Infrastructure\Traits;

use Src\BC\Booking\Infrastructure\Models\BookingModel;

trait ReadBookingTrait
{
    public function findByIdFromModel(string $id): ?BookingModel
    {
        return BookingModel::find($id);
    }
}
