<?php

namespace Src\BC\Subscription\Domain\Enumerations;

enum SubscriptionStatusEnumeration: string
{
    case ACTIVE = 'active';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case PENDING = 'pending';
}
