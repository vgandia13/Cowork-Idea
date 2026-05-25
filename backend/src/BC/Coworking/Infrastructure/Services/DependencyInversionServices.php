<?php

namespace Src\BC\Coworking\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Coworking\Application\Port\CoworkingRepositoryPort;
use Src\BC\Coworking\Application\UseCase\CheckCoworkingExistsUseCase;
use Src\BC\Coworking\Application\UseCase\CreateCoworkingUseCase;
use Src\BC\Coworking\Application\UseCase\DeleteCoworkingUseCase;
use Src\BC\Coworking\Application\UseCase\ListCoworkingsUseCase;
use Src\BC\Coworking\Application\UseCase\ReadCoworkingUseCase;
use Src\BC\Coworking\Application\UseCase\UpdateCoworkingUseCase;
use Src\BC\Coworking\Infrastructure\Repositories\EloquentCoworkingRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CoworkingRepositoryPort::class, EloquentCoworkingRepository::class);

        $this->app->bind(CreateCoworkingUseCase::class, function ($app) {
            return new CreateCoworkingUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });

        $this->app->bind(ReadCoworkingUseCase::class, function ($app) {
            return new ReadCoworkingUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateCoworkingUseCase::class, function ($app) {
            return new UpdateCoworkingUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteCoworkingUseCase::class, function ($app) {
            return new DeleteCoworkingUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });

        $this->app->bind(ListCoworkingsUseCase::class, function ($app) {
            return new ListCoworkingsUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });

        $this->app->bind(CheckCoworkingExistsUseCase::class, function ($app) {
            return new CheckCoworkingExistsUseCase(
                $app->make(CoworkingRepositoryPort::class)
            );
        });
    }
}
