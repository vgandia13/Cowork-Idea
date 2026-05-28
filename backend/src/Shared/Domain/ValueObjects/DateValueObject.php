<?php

namespace Src\Shared\Domain\ValueObjects;

use DateTimeImmutable;
use DateTimeInterface;

abstract class DateValueObject
{
    private DateTimeImmutable $value;

    public function __construct(DateTimeInterface|string $value)
    {
        if (is_string($value)) {
            $this->value = new DateTimeImmutable($value);
        } elseif ($value instanceof DateTimeImmutable) {
            $this->value = $value;
        } else {
            $this->value = DateTimeImmutable::createFromInterface($value);
        }
    }

    public function value(): DateTimeImmutable
    {
        return $this->value;
    }

    public function format(string $format = 'Y-m-d'): string
    {
        return $this->value->format($format);
    }

    public function __toString(): string
    {
        return $this->format();
    }
}
