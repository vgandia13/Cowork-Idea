<?php

namespace Src\BC\Plan\Infrastructure\Repositories;

use Src\BC\Plan\Application\Port\PlanRepositoryPort;
use Src\BC\Plan\Domain\Entities\Plan;
use Src\BC\Plan\Domain\ValueObjects\PlanIdValueObject;
use Src\BC\Plan\Infrastructure\Hydrators\PlanHydrator;
use Src\BC\Plan\Infrastructure\Models\PlanModel;
use Src\BC\Plan\Infrastructure\Traits\CreatePlanTrait;
use Src\BC\Plan\Infrastructure\Traits\DeletePlanTrait;
use Src\BC\Plan\Infrastructure\Traits\ListPlansTrait;
use Src\BC\Plan\Infrastructure\Traits\ReadPlanTrait;
use Src\BC\Plan\Infrastructure\Traits\UpdatePlanTrait;

class EloquentPlanRepository implements PlanRepositoryPort
{
    use CreatePlanTrait;
    use ReadPlanTrait;
    use UpdatePlanTrait;
    use DeletePlanTrait;
    use ListPlansTrait;

    public function create(Plan $entity): Plan
    {
        $model = new PlanModel();
        $this->createFromModel($entity, $model);
        return PlanHydrator::toEntity($model->fresh());
    }

    public function findById(PlanIdValueObject $id): ?Plan
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return PlanHydrator::toEntity($model);
    }

    public function update(Plan $entity): Plan
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("El plan con el id {$entity->getIdValue()} no existe ");
        }
        $this->updateFromModel($entity, $model);
        return PlanHydrator::toEntity($model->fresh());
    }

    public function delete(PlanIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return PlanHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }
}
