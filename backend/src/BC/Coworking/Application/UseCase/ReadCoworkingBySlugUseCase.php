<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\Entities\Coworking;

class ReadCoworkingBySlugUseCase
{
    public function __construct(private readonly CoworkingRepositoryPort $repository) {}

    public function execute(string $slug): ?Coworking
    {
        return $this->repository->findBySlug($slug);
    }
}
