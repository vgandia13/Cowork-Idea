<?php

namespace Src\BC\Space\Domain\Enumerations;

enum SpaceStatusEnumeration: string
{
    case ACTIVE = 'active';
    case MAINTENANCE = 'maintenance';
    case HIDDEN = 'hidden';
}
