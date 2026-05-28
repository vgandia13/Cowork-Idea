<?php

namespace Src\BC\Subscription\Infrastructure\Repositories;

use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Domain\Entities\Subscription;
use Src\BC\Subscription\Domain\ValueObjects\SubscriptionIdValueObject;
use Src\BC\Subscription\Infrastructure\Hydrators\SubscriptionHydrator;
use Src\BC\Subscription\Infrastructure\Models\SubscriptionModel;
use Src\BC\Subscription\Infrastructure\Traits\CreateSubscriptionTrait;
use Src\BC\Subscription\Infrastructure\Traits\DeleteSubscriptionTrait;
use Src\BC\Subscription\Infrastructure\Traits\ListSubscriptionsTrait;
use Src\BC\Subscription\Infrastructure\Traits\ReadSubscriptionTrait;
use Src\BC\Subscription\Infrastructure\Traits\UpdateSubscriptionTrait;

class EloquentSubscriptionRepository implements SubscriptionRepositoryPort
{
    use CreateSubscriptionTrait;
    use ReadSubscriptionTrait;
    use UpdateSubscriptionTrait;
    use DeleteSubscriptionTrait;
    use ListSubscriptionsTrait;

    public function create(Subscription $entity): Subscription
    {
        $model = new SubscriptionModel();
        $this->createFromModel($entity, $model);
        return SubscriptionHydrator::toEntity($model->fresh());
    }

    public function findById(SubscriptionIdValueObject $id): ?Subscription
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return SubscriptionHydrator::toEntity($model);
    }

    public function update(Subscription $entity): Subscription
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("Subscription with id {$entity->getIdValue()} not found.");
        }
        $this->updateFromModel($entity, $model);
        return SubscriptionHydrator::toEntity($model->fresh());
    }

    public function delete(SubscriptionIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return SubscriptionHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }

    public function findByUserId(string $userId): array
    {
        $models = SubscriptionModel::where('user_id', $userId)->get();
        return $models->map(fn($model) => SubscriptionHydrator::toEntity($model))->toArray();
    }

    public function findActiveByUserId(string $userId): ?Subscription
    {
        $model = SubscriptionModel::where('user_id', $userId)
            ->where('is_active', true)
            ->first();
        if (!$model) {
            return null;
        }
        return SubscriptionHydrator::toEntity($model);
    }
}
