<?php

namespace Src\BC\Booking\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;
use Src\BC\Booking\Application\Port\BookingRepositoryPort;
use Src\BC\Booking\Application\UseCase\CheckBookingExistsUseCase;
use Src\BC\Booking\Application\UseCase\CreateBookingUseCase;
use Src\BC\Booking\Application\UseCase\DeleteBookingUseCase;
use Src\BC\Booking\Application\UseCase\ListBookingsUseCase;
use Src\BC\Booking\Application\UseCase\ListUserBookingsUseCase;
use Src\BC\Booking\Application\UseCase\ReadBookingByCodeUseCase;
use Src\BC\Booking\Application\UseCase\ReadBookingUseCase;
use Src\BC\Booking\Application\UseCase\ToggleStatusBookingUseCase;
use Src\BC\Booking\Application\UseCase\UpdateBookingUseCase;
use Src\BC\Booking\Infrastructure\Repositories\EloquentBookingRepository;

class DependencyInversionServices extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookingRepositoryPort::class, EloquentBookingRepository::class);

        $this->app->bind(CreateBookingUseCase::class, function ($app) {
            return new CreateBookingUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ReadBookingUseCase::class, function ($app) {
            return new ReadBookingUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(UpdateBookingUseCase::class, function ($app) {
            return new UpdateBookingUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(DeleteBookingUseCase::class, function ($app) {
            return new DeleteBookingUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ListBookingsUseCase::class, function ($app) {
            return new ListBookingsUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(CheckBookingExistsUseCase::class, function ($app) {
            return new CheckBookingExistsUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ReadBookingByCodeUseCase::class, function ($app) {
            return new ReadBookingByCodeUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ToggleStatusBookingUseCase::class, function ($app) {
            return new ToggleStatusBookingUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });

        $this->app->bind(ListUserBookingsUseCase::class, function ($app) {
            return new ListUserBookingsUseCase(
                $app->make(BookingRepositoryPort::class)
            );
        });
    }
}
