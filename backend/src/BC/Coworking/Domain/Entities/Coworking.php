<?php

namespace Src\BC\Coworking\Domain\Entities;

use JsonSerializable;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingNameValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingSlugValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingAddressValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCityValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCountryValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPostalCodeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingPhoneValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingEmailValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingScheduleValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingDescriptionValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLatitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingLongitudeValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingCoverValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingGalleryValueObject;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingActiveValueObject;

class Coworking implements JsonSerializable
{
    private CoworkingIdValueObject $id;

    public function __construct(
        CoworkingIdValueObject $id,
        private CoworkingNameValueObject $name,
        private CoworkingSlugValueObject $slug,
        private CoworkingAddressValueObject $address,
        private CoworkingCityValueObject $city,
        private CoworkingCountryValueObject $country,
        private CoworkingPostalCodeValueObject $postalCode,
        private ?CoworkingPhoneValueObject $phone,
        private ?CoworkingEmailValueObject $email,
        private ?CoworkingScheduleValueObject $schedule,
        private ?CoworkingDescriptionValueObject $description,
        private ?CoworkingLatitudeValueObject $latitude,
        private ?CoworkingLongitudeValueObject $longitude,
        private ?CoworkingCoverValueObject $cover,
        private ?CoworkingGalleryValueObject $gallery,
        private CoworkingActiveValueObject $active,
    ) {
        $this->id = $id;
    }

    public function getId(): CoworkingIdValueObject
    {
        return $this->id;
    }

    public function getIdValue(): string
    {
        return $this->id->value();
    }

    public function getName(): CoworkingNameValueObject
    {
        return $this->name;
    }

    public function getNameValue(): string
    {
        return $this->name?->value();
    }

    public function getSlug(): CoworkingSlugValueObject
    {
        return $this->slug;
    }

    public function getSlugValue(): string
    {
        return $this->slug?->value();
    }

    public function getAddress(): CoworkingAddressValueObject
    {
        return $this->address;
    }

    public function getAddressValue(): string
    {
        return $this->address?->value();
    }

    public function getCity(): CoworkingCityValueObject
    {
        return $this->city;
    }

    public function getCityValue(): string
    {
        return $this->city?->value();
    }

    public function getCountry(): CoworkingCountryValueObject
    {
        return $this->country;
    }

    public function getCountryValue(): string
    {
        return $this->country?->value();
    }

    public function getPostalCode(): CoworkingPostalCodeValueObject
    {
        return $this->postalCode;
    }

    public function getPostalCodeValue(): string
    {
        return $this->postalCode?->value();
    }

    public function getPhone(): ?CoworkingPhoneValueObject
    {
        return $this->phone;
    }

    public function getPhoneValue(): ?string
    {
        return $this->phone?->value();
    }

    public function getEmail(): ?CoworkingEmailValueObject
    {
        return $this->email;
    }

    public function getEmailValue(): ?string
    {
        return $this->email?->value();
    }

    public function getSchedule(): ?CoworkingScheduleValueObject
    {
        return $this->schedule;
    }

    public function getScheduleValue(): ?string
    {
        return $this->schedule?->value();
    }

    public function getDescription(): ?CoworkingDescriptionValueObject
    {
        return $this->description;
    }

    public function getDescriptionValue(): ?string
    {
        return $this->description?->value();
    }

    public function getLatitude(): ?CoworkingLatitudeValueObject
    {
        return $this->latitude;
    }

    public function getLatitudeValue(): ?float
    {
        return $this->latitude?->value();
    }

    public function getLongitude(): ?CoworkingLongitudeValueObject
    {
        return $this->longitude;
    }

    public function getLongitudeValue(): ?float
    {
        return $this->longitude?->value();
    }

    public function getCover(): ?CoworkingCoverValueObject
    {
        return $this->cover;
    }

    public function getCoverValue(): ?string
    {
        return $this->cover?->value();
    }

    public function getGallery(): ?CoworkingGalleryValueObject
    {
        return $this->gallery;
    }

    public function getGalleryValue(): ?array
    {
        return $this->gallery?->value();
    }

    public function getActive(): CoworkingActiveValueObject
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
            'slug' => $this->getSlugValue(),
            'address' => $this->getAddressValue(),
            'city' => $this->getCityValue(),
            'country' => $this->getCountryValue(),
            'postal_code' => $this->getPostalCodeValue(),
            'phone' => $this->getPhoneValue(),
            'email' => $this->getEmailValue(),
            'schedule' => $this->getScheduleValue(),
            'description' => $this->getDescriptionValue(),
            'latitude' => $this->getLatitudeValue(),
            'longitude' => $this->getLongitudeValue(),
            'cover' => $this->getCoverValue(),
            'gallery' => $this->getGalleryValue(),
            'active' => $this->getActiveValue(),
        ];
    }
}
