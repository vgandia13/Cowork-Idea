<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Space\Application\DTO\SpaceDTO;
use Src\BC\Space\Application\UseCase\CreateSpaceUseCase;

class CreateSpaceController extends Controller {

    public function __construct(private readonly CreateSpaceUseCase $useCase) {}

    public function __invoke(Request $request): JsonResponse {
        $validated = $request->validate([
            'coworking_id' => 'required|uuid',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'price_hour' => 'nullable|numeric',
            'price_day' => 'nullable|numeric',
            'price_month' => 'nullable|numeric',
            'size_m2' => 'nullable|numeric',
            'available' => 'required|boolean',
            'status' => 'required|string|max:255',
        ]);

        $dto = new SpaceDTO(
            id: null,
            coworkingId: $validated['coworking_id'],
            name: $validated['name'],
            slug: $validated['slug'],
            type: $validated['type'],
            description: $validated['description'] ?? null,
            capacity: $validated['capacity'],
            priceHour: $validated['price_hour'] ?? null,
            priceDay: $validated['price_day'] ?? null,
            priceMonth: $validated['price_month'] ?? null,
            sizeM2: $validated['size_m2'] ?? null,
            available: $validated['available'],
            status: $validated['status'],
        );

        $space = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $space->jsonSerialize(),
        ], 201);
    }
}
