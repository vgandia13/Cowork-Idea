<?php

namespace Src\BC\Coworking\Application\DTO;

class CoworkingDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $address,
        public readonly string $city,
        public readonly string $country,
        public readonly string $postalCode,
        public readonly ?string $phone,
        public readonly ?string $email,
        public readonly ?string $schedule,
        public readonly ?string $description,
        public readonly ?float $latitude,
        public readonly ?float $longitude,
        public readonly ?string $cover,
        public readonly ?array $gallery,
        public readonly bool $active,
    ) {
    }
}
