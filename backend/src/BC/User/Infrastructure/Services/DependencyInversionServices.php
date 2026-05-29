<?php

namespace Src\BC\User\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\User\Application\Port\UserRepositoryPort;
use Src\BC\User\Application\UseCase\CheckUserExistsUseCase;
use Src\BC\User\Application\UseCase\CreateUserUseCase;
use Src\BC\User\Application\UseCase\DeleteUserUseCase;
use Src\BC\User\Application\UseCase\ListUsersUseCase;
use Src\BC\User\Application\UseCase\ReadUserByEmailUseCase;
use Src\BC\User\Application\UseCase\ReadUserUseCase;
use Src\BC\User\Application\UseCase\ToggleActiveUserUseCase;
use Src\BC\User\Application\UseCase\UpdateUserUseCase;
use Src\BC\User\Infrastructure\Repositories\EloquentUserRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryPort::class, EloquentUserRepository::class);

        $this->app->bind(CreateUserUseCase::class, function ($app) {
            return new CreateUserUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(ReadUserUseCase::class, function ($app) {
            return new ReadUserUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(ReadUserByEmailUseCase::class, function ($app) {
            return new ReadUserByEmailUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateUserUseCase::class, function ($app) {
            return new UpdateUserUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteUserUseCase::class, function ($app) {
            return new DeleteUserUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(ListUsersUseCase::class, function ($app) {
            return new ListUsersUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(CheckUserExistsUseCase::class, function ($app) {
            return new CheckUserExistsUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });

        $this->app->bind(ToggleActiveUserUseCase::class, function ($app) {
            return new ToggleActiveUserUseCase(
                $app->make(UserRepositoryPort::class)
            );
        });
    }
}
