<?php

namespace Src\BC\User\Application\Port;

use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;

interface UserRepositoryPort
{
    public function create(User $entity): User;

    public function findById(UserIdValueObject $id): ?User;

    public function update(User $entity): User;

    public function delete(UserIdValueObject $id): void;

    public function findAll(int $page = 1, int $perPage = 15): array;

    public function countAll(): int;
}
