<?php

namespace Src\BC\Booking\Domain\Enumerations;

enum BookingStatusEnumeration: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}
