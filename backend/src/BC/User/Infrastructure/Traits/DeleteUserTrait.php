<?php

namespace Src\BC\User\Infrastructure\Traits;

use Src\BC\User\Infrastructure\Models\UserModel;

trait DeleteUserTrait
{
    public function deleteFromModel(string $id): void
    {
        UserModel::destroy($id);
    }
}
