<?php

namespace Src\BC\Subscription\Application\DTO;

class SubscriptionUpdateDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $userId,
        public readonly ?string $planId,
        public readonly ?string $startDate,
        public readonly ?string $endDate,
        public readonly ?bool $autoRenewal,
        public readonly ?string $status,
    ) {
    }
}
