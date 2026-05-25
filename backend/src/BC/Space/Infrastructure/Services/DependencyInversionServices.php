<?php

namespace Src\BC\Space\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Application\UseCase\CheckSpaceExistsUseCase;
use Src\BC\Space\Application\UseCase\CreateSpaceUseCase;
use Src\BC\Space\Application\UseCase\DeleteSpaceUseCase;
use Src\BC\Space\Application\UseCase\ListSpacesUseCase;
use Src\BC\Space\Application\UseCase\ListAvailableSpacesUseCase;
use Src\BC\Space\Application\UseCase\ListSpaceBookingsUseCase;
use Src\BC\Space\Application\UseCase\ReadSpaceBySlugUseCase;
use Src\BC\Space\Application\UseCase\ReadSpaceUseCase;
use Src\BC\Space\Application\UseCase\ToggleStatusSpaceUseCase;
use Src\BC\Space\Application\UseCase\UpdateSpaceUseCase;
use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Space\Infrastructure\Repositories\EloquentSpaceRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SpaceRepositoryPort::class, EloquentSpaceRepository::class);

        $this->app->bind(CreateSpaceUseCase::class, function ($app) {
            return new CreateSpaceUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(ReadSpaceUseCase::class, function ($app) {
            return new ReadSpaceUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateSpaceUseCase::class, function ($app) {
            return new UpdateSpaceUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteSpaceUseCase::class, function ($app) {
            return new DeleteSpaceUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(ListSpacesUseCase::class, function ($app) {
            return new ListSpacesUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(CheckSpaceExistsUseCase::class, function ($app) {
            return new CheckSpaceExistsUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(ReadSpaceBySlugUseCase::class, function ($app) {
            return new ReadSpaceBySlugUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(ToggleStatusSpaceUseCase::class, function ($app) {
            return new ToggleStatusSpaceUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });

        $this->app->bind(ListSpaceBookingsUseCase::class, function ($app) {
            return new ListSpaceBookingsUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ListAvailableSpacesUseCase::class, function ($app) {
            return new ListAvailableSpacesUseCase(
                $app->make(SpaceRepositoryPort::class)
            );
        });
    }
}
