<?php

namespace Src\Shared\Domain\ValueObjects;

use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;

abstract class TimeValueObject
{
    private DateTimeImmutable $value;

    public function __construct(DateTimeInterface $value)
    {
        $this->ensureIsTimeOnly($value);
        if ($value instanceof DateTimeImmutable) {
            $this->value = $value;
        } else {
            $this->value = DateTimeImmutable::createFromInterface($value);
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function format(string $format = 'H:i:s'): string
    {
        return $this->value->format($format);
    }

    public function __toString(): string
    {
        return $this->format();
    }

    private function ensureIsTimeOnly(DateTimeInterface $value): void
    {
        $formatted = $value->format('Y-m-d H:i:s');
        $expectedDate = '1970-01-01';
        if (str_contains($formatted, $expectedDate)) {
            return;
        }
        $timeOnly = $value->format('H:i:s');
        $reconstructed = \DateTimeImmutable::createFromFormat('H:i:s', $timeOnly);
        if (!$reconstructed || $reconstructed->format('H:i:s') !== $timeOnly) {
            throw new InvalidArgumentException(
                sprintf('Se espera un formato (H:i:s).', static::class, $value->format('Y-m-d H:i:s'))
            );
        }
    }
}
