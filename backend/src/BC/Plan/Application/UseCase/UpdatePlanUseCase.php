<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\DTO\PlanUpdateDTO;
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

class UpdatePlanUseCase
{
    public function __construct(
        private readonly PlanRepositoryPort $repository,
    ) {
    }

    public function execute(PlanUpdateDTO $dto): Plan
    {
        $existing = $this->repository->findById(
            new PlanIdValueObject($dto->id)
        );

        if (!$existing) {
            throw new \RuntimeException("Plan with id {$dto->id} not found.");
        }

        $updated = new Plan(
            new PlanIdValueObject($dto->id),
            $dto->name !== null ? new PlanNameValueObject($dto->name) : $existing->getName(),
            $dto->description !== null ? new PlanDescriptionValueObject($dto->description) : $existing->getDescription(),
            $dto->price !== null ? new PlanPriceValueObject($dto->price) : $existing->getPrice(),
            $dto->duration !== null ? new PlanDurationValueObject($dto->duration) : $existing->getDuration(),
            $dto->credits !== null ? new PlanCreditsValueObject($dto->credits) : $existing->getCredits(),
            $dto->meetingHours !== null ? new PlanMeetingHoursValueObject($dto->meetingHours) : $existing->getMeetingHours(),
            $dto->access247 !== null ? new PlanAccess247ValueObject($dto->access247) : $existing->getAccess247(),
            $dto->active !== null ? new PlanActiveValueObject($dto->active) : $existing->getActive(),
        );

        return $this->repository->update($updated);
    }
}
