<?php

namespace Src\BC\Plan\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Plan\Application\Port\PlanRepositoryPort;
use Src\BC\Plan\Application\UseCase\CheckPlanExistsUseCase;
use Src\BC\Plan\Application\UseCase\CreatePlanUseCase;
use Src\BC\Plan\Application\UseCase\DeletePlanUseCase;
use Src\BC\Plan\Application\UseCase\ListPlansUseCase;
use Src\BC\Plan\Application\UseCase\ReadPlanUseCase;
use Src\BC\Plan\Application\UseCase\UpdatePlanUseCase;
use Src\BC\Plan\Infrastructure\Repositories\EloquentPlanRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PlanRepositoryPort::class, EloquentPlanRepository::class);

        $this->app->bind(CreatePlanUseCase::class, function ($app) {
            return new CreatePlanUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });

        $this->app->bind(ReadPlanUseCase::class, function ($app) {
            return new ReadPlanUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });

        $this->app->bind(UpdatePlanUseCase::class, function ($app) {
            return new UpdatePlanUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });

        $this->app->bind(DeletePlanUseCase::class, function ($app) {
            return new DeletePlanUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });

        $this->app->bind(ListPlansUseCase::class, function ($app) {
            return new ListPlansUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });

        $this->app->bind(CheckPlanExistsUseCase::class, function ($app) {
            return new CheckPlanExistsUseCase(
                $app->make(PlanRepositoryPort::class)
            );
        });
    }
}
