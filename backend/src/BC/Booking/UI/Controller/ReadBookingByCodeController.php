<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Booking\Application\UseCase\ReadBookingByCodeUseCase;

class ReadBookingByCodeController extends Controller {
    public function __construct(private readonly ReadBookingByCodeUseCase $useCase) {}

    public function __invoke(string $bookingCode): JsonResponse {
        $booking = $this->useCase->execute($bookingCode);

        if (!$booking) {
            return response()->json(['status' => 'error', 'error' => 'Booking not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $booking->jsonSerialize()]);
    }
}
