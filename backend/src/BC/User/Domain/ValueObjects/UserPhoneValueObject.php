<?php

namespace Src\BC\User\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class UserPhoneValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
