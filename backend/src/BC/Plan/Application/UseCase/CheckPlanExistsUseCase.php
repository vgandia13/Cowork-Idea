<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\Port\PlanRepositoryPort;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;

class CheckPlanExistsUseCase {

    public function __construct(private readonly PlanRepositoryPort $repository) {}

    public function execute(string $id): bool {
        return $this->repository->findById(
            new PlanIdValueObject($id)
        ) !== null;
    }
}
