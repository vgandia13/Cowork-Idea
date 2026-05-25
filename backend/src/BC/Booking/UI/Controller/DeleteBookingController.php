<?php

namespace Src\BC\Booking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Booking\Application\UseCase\DeleteBookingUseCase;

class DeleteBookingController extends Controller
{
    public function __construct(
        private readonly DeleteBookingUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
