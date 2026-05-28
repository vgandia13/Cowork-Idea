<?php

namespace Src\BC\Plan\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class PlanDescriptionValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
