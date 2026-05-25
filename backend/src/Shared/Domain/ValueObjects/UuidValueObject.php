<?php

namespace Src\Shared\Domain\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

abstract class UuidValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function generate(): static
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function equals(UuidValueObject $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid(string $value): void
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $value)
            );
        }
    }
}
