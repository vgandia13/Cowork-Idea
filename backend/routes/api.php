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
use Src\BC\User\UI\Controller\Auth\LoginController;
use Src\BC\User\UI\Controller\Auth\LogoutController;

Route::prefix('v1')->group(function () {

    Route::post('/auth/login',    LoginController::class);
    Route::post('/auth/logout', LogoutController::class)->middleware('auth:sanctum');




    Route::middleware('auth-sanctum')->group(function () {

    // ─── Users
    Route::get('/users',                    ListUsersController::class)->middleware('role:admin');
    Route::post('/users',                   CreateUserController::class);                          // registro de guest o admin
    Route::get('/users/{id}',               ReadUserController::class)->middleware('role:admin,member');
    Route::put('/users/{id}',               UpdateUserController::class)->middleware('role:admin,member');
    Route::delete('/users/{id}',            DeleteUserController::class)->middleware('role:admin');
    Route::patch('/users/{id}/active',      ToggleActiveUserController::class)->middleware('role:admin');

    // ─── Coworkings
    Route::get('/coworkings',                       ListCoworkingsController::class);              // guest
    Route::post('/coworkings',                      CreateCoworkingController::class)->middleware('role:admin');
    Route::get('/coworkings/slug/{slug}',            ReadCoworkingBySlugController::class);        // guest
    Route::get('/coworkings/{id}',                  ReadCoworkingController::class);               // guest
    Route::put('/coworkings/{id}',                  UpdateCoworkingController::class)->middleware('role:admin');
    Route::delete('/coworkings/{id}',               DeleteCoworkingController::class)->middleware('role:admin');
    Route::patch('/coworkings/{id}/active',          ToggleActiveCoworkingController::class)->middleware('role:admin');
    Route::get('/coworkings/{id}/spaces',            ListCoworkingSpacesController::class);        // guest
    Route::get('/coworkings/{id}/amenities',         ListCoworkingAmenitiesController::class);     // guest

    // ─── Spaces
    Route::get('/spaces',                   ListSpacesController::class);                          // guest
    Route::post('/spaces',                  CreateSpaceController::class)->middleware('role:admin');
    Route::get('/spaces/available',         ListAvailableSpacesController::class);                 // guest
    Route::get('/spaces/slug/{slug}',       ReadSpaceBySlugController::class);                     // guest
    Route::get('/spaces/{id}',              ReadSpaceController::class);                           // guest
    Route::put('/spaces/{id}',              UpdateSpaceController::class)->middleware('role:admin');
    Route::delete('/spaces/{id}',           DeleteSpaceController::class)->middleware('role:admin');
    Route::patch('/spaces/{id}/status',     ToggleStatusSpaceController::class)->middleware('role:admin');
    Route::get('/spaces/{id}/bookings',     ListSpaceBookingsController::class)->middleware('role:admin');

    // ─── Amenities
    Route::get('/amenities',                ListAmenitiesController::class);                       // guest
    Route::post('/amenities',               CreateAmenityController::class)->middleware('role:admin');
    Route::get('/amenities/{id}',           ReadAmenityController::class);                         // guest
    Route::put('/amenities/{id}',           UpdateAmenityController::class)->middleware('role:admin');
    Route::delete('/amenities/{id}',        DeleteAmenityController::class)->middleware('role:admin');

    // ─── Bookings
    Route::get('/bookings',                         ListBookingsController::class)->middleware('role:admin');
    Route::post('/bookings',                        CreateBookingController::class)->middleware('role:admin,member');
    Route::get('/bookings/code/{booking_code}',     ReadBookingByCodeController::class)->middleware('role:admin,member');
    Route::get('/bookings/{id}',                    ReadBookingController::class)->middleware('role:admin,member');
    Route::put('/bookings/{id}',                    UpdateBookingController::class)->middleware('role:admin');
    Route::delete('/bookings/{id}',                 DeleteBookingController::class)->middleware('role:admin');
    Route::patch('/bookings/{id}/status',            ToggleStatusBookingController::class)->middleware('role:admin');

    // ─── Plans
    Route::get('/plans',                    ListPlansController::class);                           // guest
    Route::post('/plans',                   CreatePlanController::class)->middleware('role:admin');
    Route::get('/plans/{id}',               ReadPlanController::class);                            // guest
    Route::put('/plans/{id}',               UpdatePlanController::class)->middleware('role:admin');
    Route::delete('/plans/{id}',            DeletePlanController::class)->middleware('role:admin');
    Route::patch('/plans/{id}/active',      ToggleActivePlanController::class)->middleware('role:admin');

    // ─── Subscriptions
    Route::get('/subscriptions',                    ListSubscriptionsController::class)->middleware('role:admin');
    Route::post('/subscriptions',                   CreateSubscriptionController::class)->middleware('role:admin,member');
    Route::get('/subscriptions/{id}',               ReadSubscriptionController::class)->middleware('role:admin,member');
    Route::put('/subscriptions/{id}',               UpdateSubscriptionController::class)->middleware('role:admin');
    Route::delete('/subscriptions/{id}',            DeleteSubscriptionController::class)->middleware('role:admin');
    Route::patch('/subscriptions/{id}/status',      ToggleStatusSubscriptionController::class)->middleware('role:admin');

    // ─── Cross (nested under users)
    Route::get('/users/{id}/bookings',              ListUserBookingsController::class)->middleware('role:admin,member');
    Route::get('/users/{id}/subscriptions',         ListUserSubscriptionsController::class)->middleware('role:admin,member');
    Route::get('/users/{id}/subscriptions/active',  ReadActiveUserSubscriptionController::class)->middleware('role:admin,member');

});
});