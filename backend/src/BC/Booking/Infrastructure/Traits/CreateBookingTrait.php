<?php

namespace Src\BC\Booking\Infrastructure\Traits;

use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Infrastructure\Models\BookingModel;

trait CreateBookingTrait
{
    public function createFromModel(Booking $entity, BookingModel $model): void  {
        $model->id = $entity->getIdValue();
        $model->user_id = $entity->getUserIdValue();
        $model->space_id = $entity->getSpaceIdValue();
        $model->start_date = $entity->getStartDateValue();
        $model->end_date = $entity->getEndDateValue();
        $model->created_at = $entity->getCreatedAtValue();
        $model->total = $entity->getTotalValue();
        $model->status = $entity->getStatusValue();
        $model->notes = $entity->getNotesValue();
        $model->booking_code = $entity->getBookingCodeValue();
        $model->save();
    }
}
