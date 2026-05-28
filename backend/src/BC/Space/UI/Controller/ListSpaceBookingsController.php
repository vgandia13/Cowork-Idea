<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Space\Application\UseCase\ListSpaceBookingsUseCase;

class ListSpaceBookingsController extends Controller {

    public function __construct(private readonly ListSpaceBookingsUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        $bookings = $this->useCase->execute($id);

        return response()->json(['status' => 'success', 'data' => $bookings->jsonSerialize()]);
    }
}
