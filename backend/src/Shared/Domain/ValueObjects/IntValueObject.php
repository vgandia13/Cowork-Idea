<?php

namespace Src\Shared\Domain\ValueObjects;

use InvalidArgumentException;

abstract class IntValueObject
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    protected function ensureMinValue(int $value, int $min): void
    {
        if ($value < $min) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. El minimo es %d.', static::class, $value, $min)
            );
        }
    }

    protected function ensureMaxValue(int $value, int $max): void
    {
        if ($value > $max) {
            throw new InvalidArgumentException(
                sprintf('<%s> no permite el valor <%s>. El maximo es %d.', static::class, $value, $max)
            );
        }
    }
}
