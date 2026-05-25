<?php

namespace Src\BC\Amenity\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Amenity\Application\UseCase\DeleteAmenityUseCase;

class DeleteAmenityController extends Controller
{
    public function __construct(
        private readonly DeleteAmenityUseCase $useCase,
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
