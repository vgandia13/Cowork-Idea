<?php

namespace Src\BC\Space\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Space\Application\Port\SpaceRepositoryPort;
use Src\BC\Space\Application\UseCase\CheckSpaceExistsUseCase;
use Src\BC\Space\Application\UseCase\CreateSpaceUseCase;
use Src\BC\Space\Application\UseCase\DeleteSpaceUseCase;
use Src\BC\Space\Application\UseCase\ListSpacesUseCase;
use Src\BC\Space\Application\UseCase\ReadSpaceUseCase;
use Src\BC\Space\Application\UseCase\UpdateSpaceUseCase;
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
    }
}
