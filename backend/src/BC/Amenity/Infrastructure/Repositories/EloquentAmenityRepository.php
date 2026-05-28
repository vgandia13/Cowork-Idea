<?php

namespace Src\BC\Amenity\Infrastructure\Repositories;

use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Domain\Entities\Amenity;
use Src\BC\Amenity\Domain\ValueObjects\AmenityIdValueObject;
use Src\BC\Amenity\Infrastructure\Hydrators\AmenityHydrator;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;
use Src\BC\Amenity\Infrastructure\Traits\CreateAmenityTrait;
use Src\BC\Amenity\Infrastructure\Traits\DeleteAmenityTrait;
use Src\BC\Amenity\Infrastructure\Traits\ListAmenitiesTrait;
use Src\BC\Amenity\Infrastructure\Traits\ReadAmenityTrait;
use Src\BC\Amenity\Infrastructure\Traits\UpdateAmenityTrait;

class EloquentAmenityRepository implements AmenityRepositoryPort
{
    use CreateAmenityTrait;
    use ReadAmenityTrait;
    use UpdateAmenityTrait;
    use DeleteAmenityTrait;
    use ListAmenitiesTrait;

    public function create(Amenity $entity): Amenity
    {
        $model = new AmenityModel();
        $this->createFromModel($entity, $model);
        return AmenityHydrator::toEntity($model->fresh());
    }

    public function findById(AmenityIdValueObject $id): ?Amenity
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return AmenityHydrator::toEntity($model);
    }

    public function update(Amenity $entity): Amenity
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException("El amenity con el id {$entity->getIdValue()} no se ha encontrado");
        }
        $this->updateFromModel($entity, $model);
        return AmenityHydrator::toEntity($model->fresh());
    }

    public function delete(AmenityIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return AmenityHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }
}
