<?php

namespace Src\Shared\Domain\ValueObjects;

use InvalidArgumentException;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    protected function ensureMinLength(string $value, int $min): void
    {
        if (mb_strlen(trim($value)) < $min) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>. Must have at least %d characters.', static::class, $value, $min)
            );
        }
    }

    protected function ensureMaxLength(string $value, int $max): void
    {
        if (mb_strlen(trim($value)) > $max) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>. Must have at most %d characters.', static::class, $value, $max)
            );
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
