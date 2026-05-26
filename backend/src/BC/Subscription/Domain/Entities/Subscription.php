<?php

namespace Src\BC\Subscription\Domain\Entities;

use JsonSerializable;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionUserIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionPlanIdValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStartDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionEndDateValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionAutoRenewalValueObject;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionStatusValueObject;

class Subscription implements JsonSerializable
{
    private SubscriptionIdValueObject $id;

    public function __construct(
        SubscriptionIdValueObject $id,
        private SubscriptionUserIdValueObject $userId,
        private SubscriptionPlanIdValueObject $planId,
        private SubscriptionStartDateValueObject $startDate,
        private ?SubscriptionEndDateValueObject $endDate,
        private SubscriptionAutoRenewalValueObject $autoRenewal,
        private SubscriptionStatusValueObject $status,
    ) {
        $this->id = $id;
    }

    public function getId(): SubscriptionIdValueObject { return $this->id;}
    public function getIdValue(): string { return $this->id->value(); }

    public function getUserId(): SubscriptionUserIdValueObject { return $this->userId; }
    public function getUserIdValue(): string { return $this->userId?->value(); }

    public function getPlanId(): SubscriptionPlanIdValueObject { return $this->planId; }
    public function getPlanIdValue(): string { return $this->planId?->value(); }

    public function getStartDate(): SubscriptionStartDateValueObject { return $this->startDate; }
    public function getStartDateValue(): string { return $this->startDate?->value(); }

    public function getEndDate(): ?SubscriptionEndDateValueObject { return $this->endDate; }
    public function getEndDateValue(): ?string { return $this->endDate?->value(); }

    public function getAutoRenewal(): SubscriptionAutoRenewalValueObject { return $this->autoRenewal; }
    public function getAutoRenewalValue(): bool { return $this->autoRenewal?->value(); }

    public function getStatus(): SubscriptionStatusValueObject { return $this->status; }
    public function getStatusValue(): string { return $this->status?->value(); }

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->getIdValue(),
            'user_id' => $this->getUserIdValue(),
            'plan_id' => $this->getPlanIdValue(),
            'start_date' => $this->getStartDateValue(),
            'end_date' => $this->getEndDateValue(),
            'auto_renewal' => $this->getAutoRenewalValue(),
            'status' => $this->getStatusValue(),
        ];
    }
}
