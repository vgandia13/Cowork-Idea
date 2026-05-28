<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;

class CheckUserExistsUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

    public function execute(string $id): bool {
        return $this->repository->findById(
            new UserIdValueObject($id)
        ) !== null;
    }
}
