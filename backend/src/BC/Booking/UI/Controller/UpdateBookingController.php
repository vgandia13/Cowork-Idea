<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Booking\Application\DTO\BookingUpdateDTO;
use Src\BC\Booking\Application\UseCase\UpdateBookingUseCase;

class UpdateBookingController extends Controller{

    public function __construct(private readonly UpdateBookingUseCase $useCase) {
    }

    public function __invoke(string $id, Request $request): JsonResponse {
        $validated = $request->validate([
            'user_id' => 'sometimes|uuid',
            'space_id' => 'sometimes|uuid',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'created_at' => 'sometimes|date',
            'total' => 'sometimes|numeric',
            'status' => 'sometimes|string|max:255',
            'notes' => 'sometimes|nullable|string',
            'booking_code' => 'sometimes|string|max:255',
        ]);

        $dto = new BookingUpdateDTO(
            id: $id,
            userId: $validated['user_id'] ?? null,
            spaceId: $validated['space_id'] ?? null,
            startDate: $validated['start_date'] ?? null,
            endDate: $validated['end_date'] ?? null,
            createdAt: $validated['created_at'] ?? null,
            total: $validated['total'] ?? null,
            status: $validated['status'] ?? null,
            notes: $validated['notes'] ?? null,
            bookingCode: $validated['booking_code'] ?? null,
        );

        try {
            $booking = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $booking->jsonSerialize(),
        ]);
    }
}
