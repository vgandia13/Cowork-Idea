<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\DTO\UserUpdateDTO;
use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;
use Src\BC\User\Domain\ValueObjects\UserFirstNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserLastNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserEmailValueObject;
use Src\BC\User\Domain\ValueObjects\UserPhoneValueObject;
use Src\BC\User\Domain\ValueObjects\UserPasswordHashValueObject;
use Src\BC\User\Domain\ValueObjects\UserAvatarValueObject;
use Src\BC\User\Domain\ValueObjects\UserCompanyValueObject;
use Src\BC\User\Domain\ValueObjects\UserRoleValueObject;
use Src\BC\User\Domain\ValueObjects\UserBioValueObject;
use Src\BC\User\Domain\ValueObjects\UserRegistrationDateValueObject;
use Src\BC\User\Domain\ValueObjects\UserActiveValueObject;

class UpdateUserUseCase
{
    public function __construct(
        private readonly UserRepositoryPort $repository,
    ) {
    }

    public function execute(UserUpdateDTO $dto): User
    {
        $existing = $this->repository->findById(
            new UserIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("User with id {$dto->id} not found.");
        }

        $updated = new User(
            new UserIdValueObject($dto->id),
            $dto->firstName !== null ? new UserFirstNameValueObject($dto->firstName) : $existing->getFirstName(),
            $dto->lastName !== null ? new UserLastNameValueObject($dto->lastName) : $existing->getLastName(),
            $dto->email !== null ? new UserEmailValueObject($dto->email) : $existing->getEmail(),
            $dto->phone !== null ? new UserPhoneValueObject($dto->phone) : $existing->getPhone(),
            $dto->passwordHash !== null ? new UserPasswordHashValueObject($dto->passwordHash) : $existing->getPasswordHash(),
            $dto->avatar !== null ? new UserAvatarValueObject($dto->avatar) : $existing->getAvatar(),
            $dto->company !== null ? new UserCompanyValueObject($dto->company) : $existing->getCompany(),
            $dto->role !== null ? new UserRoleValueObject($dto->role) : $existing->getRole(),
            $dto->bio !== null ? new UserBioValueObject($dto->bio) : $existing->getBio(),
            $dto->registrationDate !== null ? new UserRegistrationDateValueObject($dto->registrationDate) : $existing->getRegistrationDate(),
            $dto->active !== null ? new UserActiveValueObject($dto->active) : $existing->getActive(),
        );

        return $this->repository->update($updated);
    }
}
