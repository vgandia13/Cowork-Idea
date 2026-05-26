<?php

namespace Src\BC\Amenity\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Amenity\Application\DTO\AmenityUpdateDTO;
use Src\BC\Amenity\Application\UseCase\UpdateAmenityUseCase;

class UpdateAmenityController extends Controller
{
    public function __construct(private readonly UpdateAmenityUseCase $useCase) {}

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'icon' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
        ]);

        $dto = new AmenityUpdateDTO(
            id: $id,
            name: $validated['name'] ?? null,
            icon: $validated['icon'] ?? null,
            description: $validated['description'] ?? null,
        );

        try {
            $amenity = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $amenity->jsonSerialize(),
        ]);
    }
}
