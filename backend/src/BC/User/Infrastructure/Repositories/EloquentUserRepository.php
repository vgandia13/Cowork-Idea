<?php

namespace Src\BC\User\Infrastructure\Repositories;

use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;
use Src\BC\User\Infrastructure\Hydrators\UserHydrator;
use Src\BC\User\Infrastructure\Models\UserModel;
use Src\BC\User\Infrastructure\Traits\CreateUserTrait;
use Src\BC\User\Infrastructure\Traits\DeleteUserTrait;
use Src\BC\User\Infrastructure\Traits\ListUsersTrait;
use Src\BC\User\Infrastructure\Traits\ReadUserTrait;
use Src\BC\User\Infrastructure\Traits\UpdateUserTrait;

class EloquentUserRepository implements UserRepositoryPort
{
    use CreateUserTrait;
    use ReadUserTrait;
    use UpdateUserTrait;
    use DeleteUserTrait;
    use ListUsersTrait;

    public function create(User $entity): User
    {
        $model = new UserModel();
        $this->createFromModel($entity, $model);
        return UserHydrator::toEntity($model->fresh());
    }

    public function findById(UserIdValueObject $id): ?User
    {
        $model = $this->findByIdFromModel($id->value());
        if (!$model) {
            return null;
        }
        return UserHydrator::toEntity($model);
    }

    public function update(User $entity): User
    {
        $model = $this->findByIdFromModel($entity->getIdValue());
        if (!$model) {
            throw new \RuntimeException(" Usuario con el id {$entity->getIdValue()} no existe ");
        }
        $this->updateFromModel($entity, $model);
        return UserHydrator::toEntity($model->fresh());
    }

    public function delete(UserIdValueObject $id): void
    {
        $this->deleteFromModel($id->value());
    }

    public function findAll(int $page = 1, int $perPage = 15): array
    {
        $paginator = $this->findAllFromModel($page, $perPage);
        return UserHydrator::toEntityFromPaginator($paginator->getCollection());
    }

    public function countAll(): int
    {
        return $this->countAllFromModel();
    }
}
