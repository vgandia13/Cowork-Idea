<?php

namespace Src\BC\Booking\Domain\ValueObjects;

use InvalidArgumentException;
use Src\BC\Booking\Domain\Enumerations\BookingStatusEnumeration;
use Src\Shared\Domain\ValueObjects\StringValueObject;

class BookingStatusValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        $valid = array_map(fn(BookingStatusEnumeration $case) => $case->value, BookingStatusEnumeration::cases());

        if (!in_array($value, $valid, true)) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. Valores válidos: %s.', static::class, $value, implode(', ', $valid))
            );
        }

        parent::__construct($value);
    }
}
