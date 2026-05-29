<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserEmailValueObject;


class ReadUserByEmailUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

    public function execute(string $email): ?User{
        return $this->repository->findByEmail(new UserEmailValueObject($email));
    }

}
