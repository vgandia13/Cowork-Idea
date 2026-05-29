<?php

namespace Src\BC\User\Infrastructure\Traits;

use Src\BC\User\Infrastructure\Models\UserModel;


trait ReadUserByEmailTrait
{
    public function findByEmailFromModel(string $email): ?UserModel
    {
        return UserModel::where('email', $email)->first();
    }

}
