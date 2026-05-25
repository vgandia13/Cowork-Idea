<?php

namespace Src\BC\Amenity\Application\DTO;

class AmenityUpdateDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $name,
        public readonly ?string $icon,
        public readonly ?string $description,
    ) {
    }
}
