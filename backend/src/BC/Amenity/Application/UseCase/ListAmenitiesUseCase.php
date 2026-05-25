<?php

namespace Src\BC\Amenity\Application\UseCase;

use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;

class ListAmenitiesUseCase
{
    public function __construct(
        private readonly AmenityRepositoryPort $repository,
    ) {
    }

    public function execute(int $page = 1, int $perPage = 15): array
    {
        $items = $this->repository->findAll($page, $perPage);
        $total = $this->repository->countAll();

        return [
            'data' => $items,
            'meta' => [
                'total' => $total,
                'perPage' => $perPage,
                'currentPage' => $page,
                'lastPage' => (int) ceil($total / $perPage),
            ],
        ];
    }
}
