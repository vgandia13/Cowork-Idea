<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;
use Src\BC\User\Domain\ValueObjects\UserFirstNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserLastNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserEmailValueObject;
use Src\BC\User\Domain\ValueObjects\UserPhoneValueObject;
use Src\BC\User\Domain\ValueObjects\UserPasswordHashValueObject;
use Src\BC\User\Domain\ValueObjects\UserRoleValueObject;
use Src\BC\User\Domain\ValueObjects\UserRegistrationDateValueObject;
use Src\BC\User\Domain\ValueObjects\UserActiveValueObject;

class ToggleActiveUserUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

    public function execute(string $id): User {
        $existing = $this->repository->findById(new UserIdValueObject($id));

        if (!$existing) {
            throw new \RuntimeException(" El usuario con el  id {$id} no existe ");
        }

        $updated = new User(
            new UserIdValueObject($id),
            $existing->getFirstName(),
            $existing->getLastName(),
            $existing->getEmail(),
            $existing->getPhone(),
            $existing->getPasswordHash(),
            $existing->getRole(),
            $existing->getRegistrationDate(),
            new UserActiveValueObject(!$existing->getActiveValue()),
        );

        return $this->repository->update($updated);
    }
}
