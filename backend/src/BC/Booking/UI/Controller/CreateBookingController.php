<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Booking\Application\DTO\BookingDTO;
use Src\BC\Booking\Application\UseCase\CreateBookingUseCase;

class CreateBookingController extends Controller {
    
    public function __construct(private readonly CreateBookingUseCase $useCase) {}

    public function __invoke(Request $request): JsonResponse {
        $validated = $request->validate([
            'user_id' => 'required|uuid',
            'space_id' => 'required|uuid',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'created_at' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'booking_code' => 'required|string|max:255',
        ]);

        $dto = new BookingDTO(
            id: null,
            userId: $validated['user_id'],
            spaceId: $validated['space_id'],
            startDate: $validated['start_date'],
            endDate: $validated['end_date'],
            createdAt: $validated['created_at'],
            total: $validated['total'],
            status: $validated['status'],
            notes: $validated['notes'] ?? null,
            bookingCode: $validated['booking_code'],
        );

        $booking = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $booking->jsonSerialize(),
        ], 201);
    }
}
