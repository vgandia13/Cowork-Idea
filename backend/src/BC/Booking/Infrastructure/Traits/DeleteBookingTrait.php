<?php

namespace Src\BC\Booking\Infrastructure\Traits;

use Src\BC\Booking\Infrastructure\Models\BookingModel;

trait DeleteBookingTrait
{
    public function deleteFromModel(string $id): void {
        BookingModel::destroy($id);
    }
}
