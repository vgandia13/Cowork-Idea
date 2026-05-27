<?php

namespace Src\BC\Subscription\Domain\ValueObjects;

use InvalidArgumentException;
use Src\BC\Subscription\Domain\Enumerations\SubscriptionStatusEnumeration;
use Src\Shared\Domain\ValueObjects\StringValueObject;

class SubscriptionStatusValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        $valid = array_map(fn(SubscriptionStatusEnumeration $case) => $case->value, SubscriptionStatusEnumeration::cases());

        if (!in_array($value, $valid, true)) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. Valores válidos: %s.', static::class, $value, implode(', ', $valid))
            );
        }

        parent::__construct($value);
    }
}
