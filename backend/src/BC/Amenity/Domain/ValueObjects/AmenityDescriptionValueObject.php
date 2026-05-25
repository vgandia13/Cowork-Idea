<?php

namespace Src\BC\Amenity\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class AmenityDescriptionValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
