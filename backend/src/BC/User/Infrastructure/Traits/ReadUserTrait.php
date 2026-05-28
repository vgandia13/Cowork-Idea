<?php

namespace Src\BC\User\Infrastructure\Traits;

use Src\BC\User\Infrastructure\Models\UserModel;

trait ReadUserTrait
{
    public function findByIdFromModel(string $id): ?UserModel
    {
        return UserModel::find($id);
    }
}
