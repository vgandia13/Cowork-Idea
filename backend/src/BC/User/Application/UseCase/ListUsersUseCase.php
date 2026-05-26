<?php

namespace Src\BC\User\Application\UseCase;

use Src\BC\User\Application\Port\UserRepositoryPort;

class ListUsersUseCase
{
    public function __construct(private readonly UserRepositoryPort $repository) {}

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
