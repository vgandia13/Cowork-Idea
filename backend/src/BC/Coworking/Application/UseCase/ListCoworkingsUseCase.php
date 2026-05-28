<?php

namespace Src\BC\Coworking\Application\UseCase;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;

class ListCoworkingsUseCase
{
    public function __construct(private readonly CoworkingRepositoryPort $repository) {}

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
