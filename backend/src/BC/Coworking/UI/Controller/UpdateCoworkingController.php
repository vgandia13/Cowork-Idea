<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Coworking\Application\DTO\CoworkingUpdateDTO;
use Src\BC\Coworking\Application\UseCase\UpdateCoworkingUseCase;

class UpdateCoworkingController extends Controller {

    public function __construct(private readonly UpdateCoworkingUseCase $useCase) {}

    public function __invoke(string $id, Request $request): JsonResponse {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255',
            'address' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'postal_code' => 'sometimes|string|max:255',
            'phone' => 'sometimes|nullable|string|max:255',
            'email' => 'sometimes|nullable|string|max:255',
            'schedule' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'latitude' => 'sometimes|nullable|numeric',
            'longitude' => 'sometimes|nullable|numeric',
            'cover' => 'sometimes|nullable|string|max:255',
            'gallery' => 'sometimes|nullable|array',
            'active' => 'sometimes|boolean',
        ]);

        $dto = new CoworkingUpdateDTO(
            id: $id,
            name: $validated['name'] ?? null,
            slug: $validated['slug'] ?? null,
            address: $validated['address'] ?? null,
            city: $validated['city'] ?? null,
            postalCode: $validated['postal_code'] ?? null,
            phone: $validated['phone'] ?? null,
            email: $validated['email'] ?? null,
            schedule: $validated['schedule'] ?? null,
            description: $validated['description'] ?? null,
            latitude: $validated['latitude'] ?? null,
            longitude: $validated['longitude'] ?? null,
            cover: $validated['cover'] ?? null,
            gallery: $validated['gallery'] ?? null,
            active: $validated['active'] ?? null,
        );

        try {
            $coworking = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $coworking->jsonSerialize(),
        ]);
    }
}
