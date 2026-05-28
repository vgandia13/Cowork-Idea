<?php

namespace Src\BC\User\Application\DTO;

class UserUpdateDTO
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $passwordHash,
        public readonly ?string $role,
        public readonly ?string $registrationDate,
        public readonly ?bool $active,
    ) {
    }
}
