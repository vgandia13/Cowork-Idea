<?php

namespace Src\BC\Coworking\Infrastructure\Repositories;

use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Domain\Entities\Coworking;
use Src\BC\Coworking\Domain\ValueObjects\CoworkingIdValueObject;
use Src\BC\Coworking\Infrastructure\Hydrators\CoworkingHydrator;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;
use Src\BC\Coworking\Infrastructure\Traits\CreateCoworkingTrait;
use Src\BC\Coworking\Infrastructure\Traits\DeleteCoworkingTrait;
use Src\BC\Coworking\Infrastructure\Traits\ListCoworkingsTrait;
use Src\BC\Coworking\Infrastructure\Traits\ReadCoworkingTrait;
use Src\BC\Coworking\Infrastructure\Traits\UpdateCoworkingTrait;

class EloquentCoworkingRepository implements CoworkingRepositoryPort
{
    use CreateCoworkingTrait;
    use ReadCoworkingTrait;
    use UpdateCoworkingTrait;
    use DeleteCoworkingTrait;
    use ListCoworkingsTrait;

    public function create(Coworking $entity): Coworking
    {
        $model = new CoworkingModel();
        $this->createFromModel($entity, $model);
        return CoworkingHydrator::toEntity($model->fresh());
    }

    public function findById(CoworkingIdValueObject $id): ?Coworking
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return CoworkingHydrator::toEntity($model);
    }

    public function update(Coworking $entity): Coworking
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("El coworking con el id {$entity->getIdValue()} no existe");
        }
        $this->updateFromModel($entity, $model);
        return CoworkingHydrator::toEntity($model->fresh());
    }

    public function delete(CoworkingIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return CoworkingHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }

    public function findBySlug(string $slug): ?Coworking
    {
        $model = CoworkingModel::with('amenities')->where('slug', $slug)->first();
        if (!$model) {
            return null;
        }
        return CoworkingHydrator::toEntity($model);
    }
}
