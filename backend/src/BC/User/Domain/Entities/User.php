<?php

namespace Src\BC\User\Domain\Entities;

use DateTimeImmutable;
use JsonSerializable;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;
use Src\BC\User\Domain\ValueObjects\UserFirstNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserLastNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserEmailValueObject;
use Src\BC\User\Domain\ValueObjects\UserPhoneValueObject;
use Src\BC\User\Domain\ValueObjects\UserPasswordHashValueObject;
use Src\BC\User\Domain\ValueObjects\UserRoleValueObject;
use Src\BC\User\Domain\ValueObjects\UserRegistrationDateValueObject;
use Src\BC\User\Domain\ValueObjects\UserActiveValueObject;

class User implements JsonSerializable {

    private UserIdValueObject $id;

    public function __construct(
        UserIdValueObject $id,
        private UserFirstNameValueObject $firstName,
        private UserLastNameValueObject $lastName,
        private UserEmailValueObject $email,
        private ?UserPhoneValueObject $phone,
        private UserPasswordHashValueObject $passwordHash,
        private UserRoleValueObject $role,
        private UserRegistrationDateValueObject $registrationDate,
        private UserActiveValueObject $active,
    ) {
        $this->id = $id;
    }

    public function getId(): UserIdValueObject { return $this->id; }
    public function getIdValue(): string {return $this->id->value(); }

    public function getFirstName(): UserFirstNameValueObject { return $this->firstName; }
    public function getFirstNameValue(): string { return $this->firstName?->value(); }

    public function getLastName(): UserLastNameValueObject { return $this->lastName; }
    public function getLastNameValue(): string { return $this->lastName?->value(); }

    public function getEmail(): UserEmailValueObject { return $this->email; }
    public function getEmailValue(): string { return $this->email?->value(); }

    public function getPhone(): ?UserPhoneValueObject { return $this->phone; }
    public function getPhoneValue(): ?string { return $this->phone?->value(); }

    public function getPasswordHash(): UserPasswordHashValueObject { return $this->passwordHash; }
    public function getPasswordHashValue(): string { return $this->passwordHash?->value(); }

    public function getRole(): UserRoleValueObject { return $this->role; }
    public function getRoleValue(): string { return $this->role?->value(); }

    public function getRegistrationDate(): UserRegistrationDateValueObject { return $this->registrationDate; }
    public function getRegistrationDateValue(): ?DateTimeImmutable { return $this->registrationDate?->value(); }

    public function getActive(): UserActiveValueObject {return $this->active; }
    public function getActiveValue(): bool { return $this->active?->value();  }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdValue(),
            'first_name' => $this->getFirstNameValue(),
            'last_name' => $this->getLastNameValue(),
            'email' => $this->getEmailValue(),
            'phone' => $this->getPhoneValue(),
            'password_hash' => $this->getPasswordHashValue(),
            'role' => $this->getRoleValue(),
            'registration_date' => $this->getRegistrationDateValue()?->format('c'),
            'active' => $this->getActiveValue(),
        ];
    }
}
