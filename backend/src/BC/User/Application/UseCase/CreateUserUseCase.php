<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\DTO\UserDTO;
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

class CreateUserUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

    public function execute(UserDTO $dto): User {
        $user = new User(
            UserIdValueObject::generate(),
            new UserFirstNameValueObject($dto->firstName),
            new UserLastNameValueObject($dto->lastName),
            new UserEmailValueObject($dto->email),
            $dto->phone !== null ? new UserPhoneValueObject($dto->phone) : null,
            new UserPasswordHashValueObject($dto->passwordHash),
            new UserRoleValueObject($dto->role),
            new UserRegistrationDateValueObject($dto->registrationDate),
            new UserActiveValueObject($dto->active),
        );

        return $this->repository->create($user);
    }
}
