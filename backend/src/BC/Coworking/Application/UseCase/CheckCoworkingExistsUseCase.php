<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;

class CheckCoworkingExistsUseCase
{
    public function __construct(
        private readonly CoworkingRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): bool
    {
        return $this->repository->findById(
            new CoworkingIdValueObject($id)
        ) !== null;
    }
}
