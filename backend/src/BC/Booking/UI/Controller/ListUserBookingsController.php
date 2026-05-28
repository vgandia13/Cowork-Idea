<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Booking\Application\UseCase\ListUserBookingsUseCase;

class ListUserBookingsController extends Controller {
    public function __construct(private readonly ListUserBookingsUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        $bookings = $this->useCase->execute($id);

        return response()->json(['status' => 'success', 'data' => $bookings->jsonSerialize()]);
    }
}
