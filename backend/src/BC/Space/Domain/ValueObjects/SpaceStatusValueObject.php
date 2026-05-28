<?php

namespace Src\BC\Space\Domain\ValueObjects;

use InvalidArgumentException;
use Src\BC\Space\Domain\Enumerations\SpaceStatusEnumeration;
use Src\Shared\Domain\ValueObjects\StringValueObject;

class SpaceStatusValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        $valid = array_map(fn(SpaceStatusEnumeration $case) => $case->value, SpaceStatusEnumeration::cases());

        if (!in_array($value, $valid, true)) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. Valores válidos: %s.', static::class, $value, implode(', ', $valid))
            );
        }

        parent::__construct($value);
    }
}
