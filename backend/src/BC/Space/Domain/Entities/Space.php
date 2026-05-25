<?php

namespace Src\BC\Space\Domain\Entities;

use JsonSerializable;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCoworkingIdValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceNameValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSlugValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceTypeValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceDescriptionValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceCapacityValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceHourValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceDayValueObject;
use Src\BC\Space\Domain\ValueObjects\SpacePriceMonthValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceSizeM2ValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceAvailableValueObject;
use Src\BC\Space\Domain\ValueObjects\SpaceStatusValueObject;

class Space implements JsonSerializable
{
    private SpaceIdValueObject $id;

    public function __construct(
        SpaceIdValueObject $id,
        private SpaceCoworkingIdValueObject $coworkingId,
        private SpaceNameValueObject $name,
        private SpaceSlugValueObject $slug,
        private SpaceTypeValueObject $type,
        private ?SpaceDescriptionValueObject $description,
        private SpaceCapacityValueObject $capacity,
        private ?SpacePriceHourValueObject $priceHour,
        private ?SpacePriceDayValueObject $priceDay,
        private ?SpacePriceMonthValueObject $priceMonth,
        private ?SpaceSizeM2ValueObject $sizeM2,
        private SpaceAvailableValueObject $available,
        private SpaceStatusValueObject $status,
    ) {
        $this->id = $id;
    }

    public function getId(): SpaceIdValueObject
    {
        return $this->id;
    }

    public function getIdValue(): string
    {
        return $this->id->value();
    }

    public function getCoworkingId(): SpaceCoworkingIdValueObject
    {
        return $this->coworkingId;
    }

    public function getCoworkingIdValue(): string
    {
        return $this->coworkingId?->value();
    }

    public function getName(): SpaceNameValueObject
    {
        return $this->name;
    }

    public function getNameValue(): string
    {
        return $this->name?->value();
    }

    public function getSlug(): SpaceSlugValueObject
    {
        return $this->slug;
    }

    public function getSlugValue(): string
    {
        return $this->slug?->value();
    }

    public function getType(): SpaceTypeValueObject
    {
        return $this->type;
    }

    public function getTypeValue(): string
    {
        return $this->type?->value();
    }

    public function getDescription(): ?SpaceDescriptionValueObject
    {
        return $this->description;
    }

    public function getDescriptionValue(): ?string
    {
        return $this->description?->value();
    }

    public function getCapacity(): SpaceCapacityValueObject
    {
        return $this->capacity;
    }

    public function getCapacityValue(): int
    {
        return $this->capacity?->value();
    }

    public function getPriceHour(): ?SpacePriceHourValueObject
    {
        return $this->priceHour;
    }

    public function getPriceHourValue(): ?float
    {
        return $this->priceHour?->value();
    }

    public function getPriceDay(): ?SpacePriceDayValueObject
    {
        return $this->priceDay;
    }

    public function getPriceDayValue(): ?float
    {
        return $this->priceDay?->value();
    }

    public function getPriceMonth(): ?SpacePriceMonthValueObject
    {
        return $this->priceMonth;
    }

    public function getPriceMonthValue(): ?float
    {
        return $this->priceMonth?->value();
    }

    public function getSizeM2(): ?SpaceSizeM2ValueObject
    {
        return $this->sizeM2;
    }

    public function getSizeM2Value(): ?float
    {
        return $this->sizeM2?->value();
    }

    public function getAvailable(): SpaceAvailableValueObject
    {
        return $this->available;
    }

    public function getAvailableValue(): bool
    {
        return $this->available?->value();
    }

    public function getStatus(): SpaceStatusValueObject
    {
        return $this->status;
    }

    public function getStatusValue(): string
    {
        return $this->status?->value();
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdValue(),
            'coworking_id' => $this->getCoworkingIdValue(),
            'name' => $this->getNameValue(),
            'slug' => $this->getSlugValue(),
            'type' => $this->getTypeValue(),
            'description' => $this->getDescriptionValue(),
            'capacity' => $this->getCapacityValue(),
            'price_hour' => $this->getPriceHourValue(),
            'price_day' => $this->getPriceDayValue(),
            'price_month' => $this->getPriceMonthValue(),
            'size_m2' => $this->getSizeM2Value(),
            'available' => $this->getAvailableValue(),
            'status' => $this->getStatusValue(),
        ];
    }
}
