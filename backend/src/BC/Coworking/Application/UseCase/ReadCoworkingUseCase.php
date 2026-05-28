<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;

class ReadCoworkingUseCase
{
    public function __construct(private readonly CoworkingRepositoryPort $repository) {}

    public function execute(string $id): ?Coworking {
        return $this->repository->findById(
            new CoworkingIdValueObject($id)
        );
    }
}
