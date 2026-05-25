<?php

namespace Src\BC\Booking\Infrastructure\Hydrators;

use Src\BC\Booking\Domain\Entities\Booking;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingUserIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingSpaceIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStartDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingEndDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingCreatedAtValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingTotalValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStatusValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingNotesValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingBookingCodeValueObject;
use Src\BC\Booking\Infrastructure\Models\BookingModel;

class BookingHydrator
{
    public static function toEntity(BookingModel $model): Booking
    {
        return new Booking(
            new BookingIdValueObject($model->id),
            new BookingUserIdValueObject($model->user_id),
            new BookingSpaceIdValueObject($model->space_id),
            new BookingStartDateValueObject($model->start_date),
            new BookingEndDateValueObject($model->end_date),
            new BookingCreatedAtValueObject($model->created_at),
            new BookingTotalValueObject($model->total),
            new BookingStatusValueObject($model->status),
            $model->notes ? new BookingNotesValueObject($model->notes) : null,
            new BookingBookingCodeValueObject($model->booking_code),
        );
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (BookingModel $model) => self::toEntity($model))->toArray();
    }
}
