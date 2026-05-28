<?php

namespace Src\BC\Amenity\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Amenity\Application\DTO\AmenityDTO;
use Src\BC\Amenity\Application\UseCase\CreateAmenityUseCase;

class CreateAmenityController extends Controller
{
    public function __construct(private readonly CreateAmenityUseCase $useCase) {}

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $dto = new AmenityDTO(
            id: null,
            name: $validated['name'],
            icon: $validated['icon'] ?? null,
            description: $validated['description'] ?? null,
        );

        $amenity = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $amenity->jsonSerialize(),
        ], 201);
    }
}
