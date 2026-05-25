<?php

namespace Src\BC\Space\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class SpaceDescriptionValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
