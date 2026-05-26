<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\Port\PlanRepositoryPort;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;

class DeletePlanUseCase {

    public function __construct(private readonly PlanRepositoryPort $repository) {}

    public function execute(string $id): void {
        $this->repository->delete(
            new PlanIdValueObject($id)
        );
    }
}
