<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\Entities\Space;

class ListAvailableSpacesUseCase
{
    public function __construct(private readonly SpaceRepositoryPort $repository) {}

    public function execute(?string $startDate, ?string $endDate, ?string $type, ?string $coworkingId): array {
        $filters = [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'type' => $type,
            'coworking_id' => $coworkingId,
        ];

        return $this->repository->findAvailable($filters);
    }
}
