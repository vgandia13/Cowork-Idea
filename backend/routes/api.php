<?php

use Illuminate\Support\Facades\Route;
use Src\BC\Amenity\UI\Controller\CreateAmenityController;
use Src\BC\Amenity\UI\Controller\DeleteAmenityController;
use Src\BC\Amenity\UI\Controller\ListAmenitiesController;
use Src\BC\Amenity\UI\Controller\ReadAmenityController;
use Src\BC\Amenity\UI\Controller\UpdateAmenityController;
use Src\BC\Booking\UI\Controller\CreateBookingController;
use Src\BC\Booking\UI\Controller\DeleteBookingController;
use Src\BC\Booking\UI\Controller\ListBookingsController;
use Src\BC\Booking\UI\Controller\ListUserBookingsController;
use Src\BC\Booking\UI\Controller\ReadBookingByCodeController;
use Src\BC\Booking\UI\Controller\ReadBookingController;
use Src\BC\Booking\UI\Controller\ToggleStatusBookingController;
use Src\BC\Booking\UI\Controller\UpdateBookingController;
use Src\BC\Coworking\UI\Controller\CreateCoworkingController;
use Src\BC\Coworking\UI\Controller\DeleteCoworkingController;
use Src\BC\Coworking\UI\Controller\ListCoworkingAmenitiesController;
use Src\BC\Coworking\UI\Controller\ListCoworkingSpacesController;
use Src\BC\Coworking\UI\Controller\ListCoworkingsController;
use Src\BC\Coworking\UI\Controller\ReadCoworkingBySlugController;
use Src\BC\Coworking\UI\Controller\ReadCoworkingController;
use Src\BC\Coworking\UI\Controller\ToggleActiveCoworkingController;
use Src\BC\Coworking\UI\Controller\UpdateCoworkingController;
use Src\BC\Plan\UI\Controller\CreatePlanController;
use Src\BC\Plan\UI\Controller\DeletePlanController;
use Src\BC\Plan\UI\Controller\ListPlansController;
use Src\BC\Plan\UI\Controller\ReadPlanController;
use Src\BC\Plan\UI\Controller\ToggleActivePlanController;
use Src\BC\Plan\UI\Controller\UpdatePlanController;
use Src\BC\Space\UI\Controller\CreateSpaceController;
use Src\BC\Space\UI\Controller\DeleteSpaceController;
use Src\BC\Space\UI\Controller\ListAvailableSpacesController;
use Src\BC\Space\UI\Controller\ListSpaceBookingsController;
use Src\BC\Space\UI\Controller\ListSpacesController;
use Src\BC\Space\UI\Controller\ReadSpaceBySlugController;
use Src\BC\Space\UI\Controller\ReadSpaceController;
use Src\BC\Space\UI\Controller\ToggleStatusSpaceController;
use Src\BC\Space\UI\Controller\UpdateSpaceController;
use Src\BC\Subscription\UI\Controller\CreateSubscriptionController;
use Src\BC\Subscription\UI\Controller\DeleteSubscriptionController;
use Src\BC\Subscription\UI\Controller\ListSubscriptionsController;
use Src\BC\Subscription\UI\Controller\ListUserSubscriptionsController;
use Src\BC\Subscription\UI\Controller\ReadActiveUserSubscriptionController;
use Src\BC\Subscription\UI\Controller\ReadSubscriptionController;
use Src\BC\Subscription\UI\Controller\ToggleStatusSubscriptionController;
use Src\BC\Subscription\UI\Controller\UpdateSubscriptionController;
use Src\BC\User\UI\Controller\CreateUserController;
use Src\BC\User\UI\Controller\DeleteUserController;
use Src\BC\User\UI\Controller\ListUsersController;
use Src\BC\User\UI\Controller\ReadUserController;
use Src\BC\User\UI\Controller\ToggleActiveUserController;
use Src\BC\User\UI\Controller\UpdateUserController;

Route::prefix('v1')->group(function () {
// ─── Users ───────────────────────────────────────────────────
Route::get('/users', ListUsersController::class);
Route::post('/users', CreateUserController::class);
Route::get('/users/{id}', ReadUserController::class);
Route::put('/users/{id}', UpdateUserController::class);
Route::delete('/users/{id}', DeleteUserController::class);
Route::patch('/users/{id}/active', ToggleActiveUserController::class);

// ─── Coworkings ──────────────────────────────────────────────
Route::get('/coworkings', ListCoworkingsController::class);
Route::post('/coworkings', CreateCoworkingController::class);
Route::get('/coworkings/slug/{slug}', ReadCoworkingBySlugController::class);
Route::get('/coworkings/{id}', ReadCoworkingController::class);
Route::put('/coworkings/{id}', UpdateCoworkingController::class);
Route::delete('/coworkings/{id}', DeleteCoworkingController::class);
Route::patch('/coworkings/{id}/active', ToggleActiveCoworkingController::class);
Route::get('/coworkings/{id}/spaces', ListCoworkingSpacesController::class);
Route::get('/coworkings/{id}/amenities', ListCoworkingAmenitiesController::class);

// ─── Spaces ──────────────────────────────────────────────────
Route::get('/spaces', ListSpacesController::class);
Route::post('/spaces', CreateSpaceController::class);
Route::get('/spaces/available', ListAvailableSpacesController::class);
Route::get('/spaces/slug/{slug}', ReadSpaceBySlugController::class);
Route::get('/spaces/{id}', ReadSpaceController::class);
Route::put('/spaces/{id}', UpdateSpaceController::class);
Route::delete('/spaces/{id}', DeleteSpaceController::class);
Route::patch('/spaces/{id}/status', ToggleStatusSpaceController::class);
Route::get('/spaces/{id}/bookings', ListSpaceBookingsController::class);

// ─── Amenities ───────────────────────────────────────────────
Route::get('/amenities', ListAmenitiesController::class);
Route::post('/amenities', CreateAmenityController::class);
Route::get('/amenities/{id}', ReadAmenityController::class);
Route::put('/amenities/{id}', UpdateAmenityController::class);
Route::delete('/amenities/{id}', DeleteAmenityController::class);

// ─── Bookings ────────────────────────────────────────────────
Route::get('/bookings', ListBookingsController::class);
Route::post('/bookings', CreateBookingController::class);
Route::get('/bookings/code/{booking_code}', ReadBookingByCodeController::class);
Route::get('/bookings/{id}', ReadBookingController::class);
Route::put('/bookings/{id}', UpdateBookingController::class);
Route::delete('/bookings/{id}', DeleteBookingController::class);
Route::patch('/bookings/{id}/status', ToggleStatusBookingController::class);

// ─── Plans ───────────────────────────────────────────────────
Route::get('/plans', ListPlansController::class);
Route::post('/plans', CreatePlanController::class);
Route::get('/plans/{id}', ReadPlanController::class);
Route::put('/plans/{id}', UpdatePlanController::class);
Route::delete('/plans/{id}', DeletePlanController::class);
Route::patch('/plans/{id}/active', ToggleActivePlanController::class);

// ─── Subscriptions ───────────────────────────────────────────
Route::get('/subscriptions', ListSubscriptionsController::class);
Route::post('/subscriptions', CreateSubscriptionController::class);
Route::get('/subscriptions/{id}', ReadSubscriptionController::class);
Route::put('/subscriptions/{id}', UpdateSubscriptionController::class);
Route::delete('/subscriptions/{id}', DeleteSubscriptionController::class);
Route::patch('/subscriptions/{id}/status', ToggleStatusSubscriptionController::class);

// ─── Cross-context (nested under users) ──────────────────────
Route::get('/users/{id}/bookings', ListUserBookingsController::class);
Route::get('/users/{id}/subscriptions', ListUserSubscriptionsController::class);
Route::get('/users/{id}/subscriptions/active', ReadActiveUserSubscriptionController::class);
});