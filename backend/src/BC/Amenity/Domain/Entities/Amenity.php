<?php

namespace Src\BC\Amenity\Domain\Entities;

use JsonSerializable;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityNameValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIconValueObject;
use Src\BC\Amenity\Domain\ValueObjects\AmenityDescriptionValueObject;

class Amenity implements JsonSerializable
{
    private AmenityIdValueObject $id;

    public function __construct(
        AmenityIdValueObject $id,
        private AmenityNameValueObject $name,
        private ?AmenityIconValueObject $icon,
        private ?AmenityDescriptionValueObject $description,
    ) {
        $this->id = $id;
    }

    public function getId(): AmenityIdValueObject
    {
        return $this->id;
    }

    public function getIdValue(): string
    {
        return $this->id->value();
    }

    public function getName(): AmenityNameValueObject
    {
        return $this->name;
    }

    public function getNameValue(): string
    {
        return $this->name?->value();
    }

    public function getIcon(): ?AmenityIconValueObject
    {
        return $this->icon;
    }

    public function getIconValue(): ?string
    {
        return $this->icon?->value();
    }

    public function getDescription(): ?AmenityDescriptionValueObject
    {
        return $this->description;
    }

    public function getDescriptionValue(): ?string
    {
        return $this->description?->value();
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdValue(),
            'name' => $this->getNameValue(),
            'icon' => $this->getIconValue(),
            'description' => $this->getDescriptionValue(),
        ];
    }
}
