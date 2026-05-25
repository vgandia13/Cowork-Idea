<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;

class DeleteUserUseCase
{
    public function __construct(
        private readonly UserRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): void
    {
        $this->repository->delete(
            new UserIdValueObject($id)
        );
    }
}
