<?php

namespace Src\BC\Amenity\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Amenity\Application\UseCase\ReadAmenityUseCase;

class ReadAmenityController extends Controller
{
    public function __construct(private readonly ReadAmenityUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse
    {
        $amenity = $this->useCase->execute($id);

        if (!$amenity) {
            return response()->json([
                'status' => 'error',
                'error' => "El amenity con el id {$id} no se ha encontrado",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $amenity->jsonSerialize(),
        ]);
    }
}
