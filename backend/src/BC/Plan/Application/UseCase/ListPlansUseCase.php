<?php

namespace Src\BC\Plan\Application\UseCase;

use Src\BC\Plan\Application\Port\PlanRepositoryPort;

class ListPlansUseCase {

    public function __construct(private readonly PlanRepositoryPort $repository) {}

    public function execute(int $page = 1, int $perPage = 15): array {
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
