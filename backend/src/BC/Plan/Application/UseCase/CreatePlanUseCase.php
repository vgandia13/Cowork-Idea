<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\DTO\PlanDTO;
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

class CreatePlanUseCase
{
    public function __construct(
        private readonly PlanRepositoryPort $repository,
    ) {
    }

    public function execute(PlanDTO $dto): Plan
    {
        $plan = new Plan(
            PlanIdValueObject::generate(),
            new PlanNameValueObject($dto->name),
            $dto->description !== null ? new PlanDescriptionValueObject($dto->description) : null,
            new PlanPriceValueObject($dto->price),
            new PlanDurationValueObject($dto->duration),
            new PlanCreditsValueObject($dto->credits),
            new PlanMeetingHoursValueObject($dto->meetingHours),
            new PlanAccess247ValueObject($dto->access247),
            new PlanActiveValueObject($dto->active),
        );

        return $this->repository->create($plan);
    }
}
