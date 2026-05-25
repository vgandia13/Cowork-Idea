<?php

namespace Src\BC\Plan\Domain\Entities;

use JsonSerializable;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanNameValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDescriptionValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanPriceValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDurationValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanCreditsValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanMeetingHoursValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanAccess247ValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanActiveValueObject;

class Plan implements JsonSerializable
{
    private PlanIdValueObject $id;

    public function __construct(
        PlanIdValueObject $id,
        private PlanNameValueObject $name,
        private ?PlanDescriptionValueObject $description,
        private PlanPriceValueObject $price,
        private PlanDurationValueObject $duration,
        private PlanCreditsValueObject $credits,
        private PlanMeetingHoursValueObject $meetingHours,
        private PlanAccess247ValueObject $access247,
        private PlanActiveValueObject $active,
    ) {
        $this->id = $id;
    }

    public function getId(): PlanIdValueObject
    {
        return $this->id;
    }

    public function getIdValue(): string
    {
        return $this->id->value();
    }

    public function getName(): PlanNameValueObject
    {
        return $this->name;
    }

    public function getNameValue(): string
    {
        return $this->name?->value();
    }

    public function getDescription(): ?PlanDescriptionValueObject
    {
        return $this->description;
    }

    public function getDescriptionValue(): ?string
    {
        return $this->description?->value();
    }

    public function getPrice(): PlanPriceValueObject
    {
        return $this->price;
    }

    public function getPriceValue(): float
    {
        return $this->price?->value();
    }

    public function getDuration(): PlanDurationValueObject
    {
        return $this->duration;
    }

    public function getDurationValue(): string
    {
        return $this->duration?->value();
    }

    public function getCredits(): PlanCreditsValueObject
    {
        return $this->credits;
    }

    public function getCreditsValue(): int
    {
        return $this->credits?->value();
    }

    public function getMeetingHours(): PlanMeetingHoursValueObject
    {
        return $this->meetingHours;
    }

    public function getMeetingHoursValue(): int
    {
        return $this->meetingHours?->value();
    }

    public function getAccess247(): PlanAccess247ValueObject
    {
        return $this->access247;
    }

    public function getAccess247Value(): bool
    {
        return $this->access247?->value();
    }

    public function getActive(): PlanActiveValueObject
    {
        return $this->active;
    }

    public function getActiveValue(): bool
    {
        return $this->active?->value();
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdValue(),
            'name' => $this->getNameValue(),
            'description' => $this->getDescriptionValue(),
            'price' => $this->getPriceValue(),
            'duration' => $this->getDurationValue(),
            'credits' => $this->getCreditsValue(),
            'meeting_hours' => $this->getMeetingHoursValue(),
            'access247' => $this->getAccess247Value(),
            'active' => $this->getActiveValue(),
        ];
    }
}
