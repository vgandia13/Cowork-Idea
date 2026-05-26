<?php

namespace Src\BC\Booking\Domain\Entities;

use JsonSerializable;
use Src\BC\Booking\Domain\ValueObjects\BookingIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingUserIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingSpaceIdValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStartDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingEndDateValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingCreatedAtValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingTotalValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingStatusValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingNotesValueObject;
use Src\BC\Booking\Domain\ValueObjects\BookingBookingCodeValueObject;

class Booking implements JsonSerializable
{
    private BookingIdValueObject $id;

    public function __construct(
        BookingIdValueObject $id,
        private BookingUserIdValueObject $userId,
        private BookingSpaceIdValueObject $spaceId,
        private BookingStartDateValueObject $startDate,
        private BookingEndDateValueObject $endDate,
        private BookingCreatedAtValueObject $createdAt,
        private BookingTotalValueObject $total,
        private BookingStatusValueObject $status,
        private ?BookingNotesValueObject $notes,
        private BookingBookingCodeValueObject $bookingCode,
    ) {
        $this->id = $id;
    }

    public function getId(): BookingIdValueObject { return $this->id; }
    public function getIdValue(): string { return $this->id->value(); }

    public function getUserId(): BookingUserIdValueObject { return $this->userId; }
    public function getUserIdValue(): string { return $this->userId?->value(); }

    public function getSpaceId(): BookingSpaceIdValueObject { return $this->spaceId; }
    public function getSpaceIdValue(): string { return $this->spaceId?->value(); }

    public function getStartDate(): BookingStartDateValueObject { return $this->startDate; }
    public function getStartDateValue(): string { return $this->startDate?->value(); }

    public function getEndDate(): BookingEndDateValueObject { return $this->endDate; }
    public function getEndDateValue(): string { return $this->endDate?->value(); }

    public function getCreatedAt(): BookingCreatedAtValueObject { return $this->createdAt; }
    public function getCreatedAtValue(): string { return $this->createdAt?->value(); }

    public function getTotal(): BookingTotalValueObject { return $this->total; }
    public function getTotalValue(): float { return $this->total?->value(); }

    public function getStatus(): BookingStatusValueObject { return $this->status; }
    public function getStatusValue(): string { return $this->status?->value(); }

    public function getNotes(): ?BookingNotesValueObject { return $this->notes; }
    public function getNotesValue(): ?string { return $this->notes?->value(); }

    public function getBookingCode(): BookingBookingCodeValueObject { return $this->bookingCode; }
    public function getBookingCodeValue(): string { return $this->bookingCode?->value(); }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdValue(),
            'user_id' => $this->getUserIdValue(),
            'space_id' => $this->getSpaceIdValue(),
            'start_date' => $this->getStartDateValue(),
            'end_date' => $this->getEndDateValue(),
            'created_at' => $this->getCreatedAtValue(),
            'total' => $this->getTotalValue(),
            'status' => $this->getStatusValue(),
            'notes' => $this->getNotesValue(),
            'booking_code' => $this->getBookingCodeValue(),
        ];
    }
}
