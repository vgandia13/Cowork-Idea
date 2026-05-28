<?php

namespace Src\BC\User\Infrastructure\Traits;

use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Infrastructure\Models\UserModel;

trait CreateUserTrait
{
    public function createFromModel(User $entity, UserModel $model): void
    {
        $model->id = $entity->getIdValue();
        $model->first_name = $entity->getFirstNameValue();
        $model->last_name = $entity->getLastNameValue();
        $model->email = $entity->getEmailValue();
        $model->phone = $entity->getPhoneValue();
        $model->password_hash = $entity->getPasswordHashValue();
        $model->role = $entity->getRoleValue();
        $model->registration_date = $entity->getRegistrationDateValue();
        $model->active = $entity->getActiveValue();
        $model->save();
    }
}
