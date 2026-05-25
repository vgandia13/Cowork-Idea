<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;

class DeleteSpaceUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): void
    {
        $this->repository->delete(
            new SpaceIdValueObject($id)
        );
    }
}
