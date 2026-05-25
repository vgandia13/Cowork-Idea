<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\Port\PlanRepositoryPort;
use Src\BC\Plan\Domain\Entities\Plan;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanNameValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDescriptionValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanPriceValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanDurationValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanCreditsValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanMeetingHoursValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanAccess247ValueObject;
use Src\BC\Plan\Domain\ValueObjects\PlanActiveValueObject;

class ToggleActivePlanUseCase
{
    public function __construct(
        private readonly PlanRepositoryPort $repository,
    ) {
    }

    public function execute(string $id): Plan
    {
        $existing = $this->repository->findById(
            new PlanIdValueObject($id)
        );

        if (!$existing) {
            throw new \RuntimeException("Plan with id {$id} not found.");
        }

        $updated = new Plan(
            new PlanIdValueObject($id),
            $existing->getName(),
            $existing->getDescription(),
            $existing->getPrice(),
            $existing->getDuration(),
            $existing->getCredits(),
            $existing->getMeetingHours(),
            $existing->getAccess247(),
            new PlanActiveValueObject(!$existing->getActiveValue()),
        );

        return $this->repository->update($updated);
    }
}
