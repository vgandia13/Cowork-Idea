<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;

class ReadSpaceUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): ?Space
    {
        return $this->repository->findById(
            new SpaceIdValueObject($id)
        );
    }
}
