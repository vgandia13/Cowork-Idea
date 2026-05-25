<?php

namespace Src\BC\Amenity\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Amenity\Application\Port\AmenityRepositoryPort;
use Src\BC\Amenity\Application\UseCase\CheckAmenityExistsUseCase;
use Src\BC\Amenity\Application\UseCase\CreateAmenityUseCase;
use Src\BC\Amenity\Application\UseCase\DeleteAmenityUseCase;
use Src\BC\Amenity\Application\UseCase\ListAmenitiesUseCase;
use Src\BC\Amenity\Application\UseCase\ReadAmenityUseCase;
use Src\BC\Amenity\Application\UseCase\UpdateAmenityUseCase;
use Src\BC\Amenity\Infrastructure\Repositories\EloquentAmenityRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AmenityRepositoryPort::class, EloquentAmenityRepository::class);

        $this->app->bind(CreateAmenityUseCase::class, function ($app) {
            return new CreateAmenityUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });

        $this->app->bind(ReadAmenityUseCase::class, function ($app) {
            return new ReadAmenityUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateAmenityUseCase::class, function ($app) {
            return new UpdateAmenityUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteAmenityUseCase::class, function ($app) {
            return new DeleteAmenityUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });

        $this->app->bind(ListAmenitiesUseCase::class, function ($app) {
            return new ListAmenitiesUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });

        $this->app->bind(CheckAmenityExistsUseCase::class, function ($app) {
            return new CheckAmenityExistsUseCase(
                $app->make(AmenityRepositoryPort::class)
            );
        });
    }
}
