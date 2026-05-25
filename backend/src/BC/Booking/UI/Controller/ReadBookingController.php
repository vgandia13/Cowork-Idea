<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Booking\Application\UseCase\ReadBookingUseCase;

class ReadBookingController extends Controller
{
    public function __construct(
        private readonly ReadBookingUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $booking = $this->useCase->execute($id);

        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'error' => "Booking with id {$id} not found.",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $booking->jsonSerialize(),
        ]);
    }
}
