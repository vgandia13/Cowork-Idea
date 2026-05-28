<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\Entities\Space;

class ListCoworkingSpacesUseCase
{
    public function __construct(private readonly SpaceRepositoryPort $spaceRepository) {}

    public function execute(string $coworkingId): array {
        return $this->spaceRepository->findByCoworkingId($coworkingId);
    }
}
