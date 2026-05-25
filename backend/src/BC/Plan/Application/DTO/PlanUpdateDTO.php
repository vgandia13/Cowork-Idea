<?php

namespace Src\BC\Plan\Application\DTO;

class PlanUpdateDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $name,
        public readonly ?string $description,
        public readonly ?float $price,
        public readonly ?string $duration,
        public readonly ?int $credits,
        public readonly ?int $meetingHours,
        public readonly ?bool $access247,
        public readonly ?bool $active,
    ) {
    }
}
