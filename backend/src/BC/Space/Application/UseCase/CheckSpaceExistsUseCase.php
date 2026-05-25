<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;

class CheckSpaceExistsUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): bool
    {
        return $this->repository->findById(
            new SpaceIdValueObject($id)
        ) !== null;
    }
}
