<?php

namespace Src\BC\Space\Infrastructure\Repositories;

use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Domain\Entities\Space;
use Src\BC\Space\Domain\ValueObjects\SpaceIdValueObject;
use Src\BC\Space\Infrastructure\Hydrators\SpaceHydrator;
use Src\BC\Space\Infrastructure\Models\SpaceModel;
use Src\BC\Space\Infrastructure\Traits\CreateSpaceTrait;
use Src\BC\Space\Infrastructure\Traits\DeleteSpaceTrait;
use Src\BC\Space\Infrastructure\Traits\ListSpacesTrait;
use Src\BC\Space\Infrastructure\Traits\ReadSpaceTrait;
use Src\BC\Space\Infrastructure\Traits\UpdateSpaceTrait;

class EloquentSpaceRepository implements SpaceRepositoryPort
{
    use CreateSpaceTrait;
    use ReadSpaceTrait;
    use UpdateSpaceTrait;
    use DeleteSpaceTrait;
    use ListSpacesTrait;

    public function create(Space $entity): Space
    {
        $model = new SpaceModel();
        $this->createFromModel($entity, $model);
        return SpaceHydrator::toEntity($model->fresh());
    }

    public function findById(SpaceIdValueObject $id): ?Space
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return SpaceHydrator::toEntity($model);
    }

    public function update(Space $entity): Space
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("Space with id {$entity->getIdValue()} not found.");
        }
        $this->updateFromModel($entity, $model);
        return SpaceHydrator::toEntity($model->fresh());
    }

    public function delete(SpaceIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return SpaceHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }
}
