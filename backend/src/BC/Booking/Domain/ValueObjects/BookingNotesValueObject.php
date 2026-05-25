<?php

namespace Src\BC\Booking\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class BookingNotesValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
