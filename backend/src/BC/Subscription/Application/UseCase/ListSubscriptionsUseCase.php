<?php

namespace Src\BC\Subscription\Application\UseCase;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;

class ListSubscriptionsUseCase
{
    public function __construct(
        private readonly SubscriptionRepositoryPort $repository,
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
