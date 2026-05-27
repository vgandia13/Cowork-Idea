<?php

namespace Src\BC\Space\Domain\Enumerations;

enum SpaceTypeEnumeration: string
{
    case FLEX = 'flex';
    case FIXED = 'fixed';
    case PRIVATE = 'private';
    case MEETING = 'meeting';
    case EVENT = 'event';
}
