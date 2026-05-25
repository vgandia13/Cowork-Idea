<?php

namespace Src\BC\Space\Application\UseCase;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;

class ListSpacesUseCase
{
    public function __construct(
        private readonly SpaceRepositoryPort $repository,
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
