<?php

namespace Src\BC\Coworking\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class CoworkingGalleryValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        parent::__construct($value ?? '');
    }
}
