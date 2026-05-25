<?php

namespace Src\BC\User\Infrastructure\Hydrators;

use Src\BC\User\Domain\Entities\User;
use Src\BC\User\Domain\ValueObjects\UserIdValueObject;
use Src\BC\User\Domain\ValueObjects\UserFirstNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserLastNameValueObject;
use Src\BC\User\Domain\ValueObjects\UserEmailValueObject;
use Src\BC\User\Domain\ValueObjects\UserPhoneValueObject;
use Src\BC\User\Domain\ValueObjects\UserPasswordHashValueObject;
use Src\BC\User\Domain\ValueObjects\UserAvatarValueObject;
use Src\BC\User\Domain\ValueObjects\UserCompanyValueObject;
use Src\BC\User\Domain\ValueObjects\UserRoleValueObject;
use Src\BC\User\Domain\ValueObjects\UserBioValueObject;
use Src\BC\User\Domain\ValueObjects\UserRegistrationDateValueObject;
use Src\BC\User\Domain\ValueObjects\UserActiveValueObject;
use Src\BC\User\Infrastructure\Models\UserModel;

class UserHydrator
{
    public static function toEntity(UserModel $model): User
    {
        return new User(
            new UserIdValueObject($model->id),
            new UserFirstNameValueObject($model->first_name),
            new UserLastNameValueObject($model->last_name),
            new UserEmailValueObject($model->email),
            $model->phone ? new UserPhoneValueObject($model->phone) : null,
            new UserPasswordHashValueObject($model->password_hash),
            $model->avatar ? new UserAvatarValueObject($model->avatar) : null,
            $model->company ? new UserCompanyValueObject($model->company) : null,
            new UserRoleValueObject($model->role),
            $model->bio ? new UserBioValueObject($model->bio) : null,
            new UserRegistrationDateValueObject($model->registration_date),
            new UserActiveValueObject($model->active),
        );
    }

    public static function toEntityFromPaginator(\Illuminate\Support\Collection $items): array
    {
        return $items->map(fn (UserModel $model) => self::toEntity($model))->toArray();
    }
}
