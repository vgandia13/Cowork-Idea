<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Space\Application\DTO\SpaceUpdateDTO;
use Src\BC\Space\Application\UseCase\UpdateSpaceUseCase;

class UpdateSpaceController extends Controller
{
    public function __construct(
        private readonly UpdateSpaceUseCase $useCase,
    ) {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'coworking_id' => 'sometimes|uuid',
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'capacity' => 'sometimes|integer',
            'price_hour' => 'sometimes|nullable|numeric',
            'price_day' => 'sometimes|nullable|numeric',
            'price_month' => 'sometimes|nullable|numeric',
            'size_m2' => 'sometimes|nullable|numeric',
            'available' => 'sometimes|boolean',
            'status' => 'sometimes|string|max:255',
        ]);

        $dto = new SpaceUpdateDTO(
            id: $id,
            coworkingId: $validated['coworking_id'] ?? null,
            name: $validated['name'] ?? null,
            slug: $validated['slug'] ?? null,
            type: $validated['type'] ?? null,
            description: $validated['description'] ?? null,
            capacity: $validated['capacity'] ?? null,
            priceHour: $validated['price_hour'] ?? null,
            priceDay: $validated['price_day'] ?? null,
            priceMonth: $validated['price_month'] ?? null,
            sizeM2: $validated['size_m2'] ?? null,
            available: $validated['available'] ?? null,
            status: $validated['status'] ?? null,
        );

        try {
            $space = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $space->jsonSerialize(),
        ]);
    }
}
