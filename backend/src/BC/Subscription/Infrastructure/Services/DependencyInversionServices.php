<?php

namespace Src\BC\Subscription\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Subscription\Application\Port\SubscriptionRepositoryPort;
use Src\BC\Subscription\Application\UseCase\CheckSubscriptionExistsUseCase;
use Src\BC\Subscription\Application\UseCase\CreateSubscriptionUseCase;
use Src\BC\Subscription\Application\UseCase\DeleteSubscriptionUseCase;
use Src\BC\Subscription\Application\UseCase\ListSubscriptionsUseCase;
use Src\BC\Subscription\Application\UseCase\ReadSubscriptionUseCase;
use Src\BC\Subscription\Application\UseCase\UpdateSubscriptionUseCase;
use Src\BC\Subscription\Infrastructure\Repositories\EloquentSubscriptionRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SubscriptionRepositoryPort::class, EloquentSubscriptionRepository::class);

        $this->app->bind(CreateSubscriptionUseCase::class, function ($app) {
            return new CreateSubscriptionUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });

        $this->app->bind(ReadSubscriptionUseCase::class, function ($app) {
            return new ReadSubscriptionUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateSubscriptionUseCase::class, function ($app) {
            return new UpdateSubscriptionUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteSubscriptionUseCase::class, function ($app) {
            return new DeleteSubscriptionUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });

        $this->app->bind(ListSubscriptionsUseCase::class, function ($app) {
            return new ListSubscriptionsUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });

        $this->app->bind(CheckSubscriptionExistsUseCase::class, function ($app) {
            return new CheckSubscriptionExistsUseCase(
                $app->make(SubscriptionRepositoryPort::class)
            );
        });
    }
}
