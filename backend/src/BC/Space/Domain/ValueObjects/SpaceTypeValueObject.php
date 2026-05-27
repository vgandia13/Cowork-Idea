<?php

namespace Src\BC\Space\Domain\ValueObjects;

use InvalidArgumentException;
use Src\BC\Space\Domain\Enumerations\SpaceTypeEnumeration;
use Src\Shared\Domain\ValueObjects\StringValueObject;

class SpaceTypeValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        $valid = array_map(fn(SpaceTypeEnumeration $case) => $case->value, SpaceTypeEnumeration::cases());

        if (!in_array($value, $valid, true)) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. Valores válidos: %s.', static::class, $value, implode(', ', $valid))
            );
        }

        parent::__construct($value);
    }
}
