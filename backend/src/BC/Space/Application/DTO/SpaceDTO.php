<?php

namespace Src\BC\Space\Application\DTO;

class SpaceDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $coworkingId,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $type,
        public readonly ?string $description,
        public readonly int $capacity,
        public readonly ?float $priceHour,
        public readonly ?float $priceDay,
        public readonly ?float $priceMonth,
        public readonly ?float $sizeM2,
        public readonly bool $available,
        public readonly string $status,
    ) {
    }
}
