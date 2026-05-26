<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Booking\Application\UseCase\ToggleStatusBookingUseCase;

class ToggleStatusBookingController extends Controller
{
    public function __construct(private readonly ToggleStatusBookingUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        try {
            $booking = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $booking->jsonSerialize()]);
    }
}
