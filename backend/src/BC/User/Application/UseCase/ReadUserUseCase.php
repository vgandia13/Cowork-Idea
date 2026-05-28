<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;

class ReadUserUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

    public function execute(string $id): ?User {
        return $this->repository->findById(new UserIdValueObject($id));
    }
}
