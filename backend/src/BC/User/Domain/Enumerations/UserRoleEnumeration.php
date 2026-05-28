<?php

namespace Src\BC\User\Domain\Enumerations;

enum UserRoleEnumeration: string
{
    case GUEST = 'Guest';
    case MEMBER = 'Member';
    case ADMIN = 'Admin';
}
