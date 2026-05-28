<?php

use App\Providers\AppServiceProvider;
use Src\BC\Amenity\Infrastructure\Services\DependencyInversionServices as AmenityDIS;
use Src\BC\Booking\Infrastructure\Services\DependencyInversionServices as BookingDIS;
use Src\BC\Coworking\Infrastructure\Services\DependencyInversionServices as CoworkingDIS;
use Src\BC\Plan\Infrastructure\Services\DependencyInversionServices as PlanDIS;
use Src\BC\Space\Infrastructure\Services\DependencyInversionServices as SpaceDIS;
use Src\BC\Subscription\Infrastructure\Services\DependencyInversionServices as SubscriptionDIS;
use Src\BC\User\Infrastructure\Services\DependencyInversionServices as UserDIS;

return [
    AppServiceProvider::class,
    Laravel\Sanctum\SanctumServiceProvider::class,
    AmenityDIS::class,
    BookingDIS::class,
    CoworkingDIS::class,
    PlanDIS::class,
    SpaceDIS::class,
    SubscriptionDIS::class,
    UserDIS::class,
];
