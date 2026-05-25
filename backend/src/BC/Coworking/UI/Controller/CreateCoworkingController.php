<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Coworking\Application\DTO\CoworkingDTO;
use Src\BC\Coworking\Application\UseCase\CreateCoworkingUseCase;

class CreateCoworkingController extends Controller
{
    public function __construct(
        private readonly CreateCoworkingUseCase $useCase,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'cover' => 'nullable|string|max:255',
            'gallery' => 'nullable|array',
            'active' => 'required|boolean',
        ]);

        $dto = new CoworkingDTO(
            id: null,
            name: $validated['name'],
            slug: $validated['slug'],
            address: $validated['address'],
            city: $validated['city'],
            country: $validated['country'],
            postalCode: $validated['postal_code'],
            phone: $validated['phone'] ?? null,
            email: $validated['email'] ?? null,
            schedule: $validated['schedule'] ?? null,
            description: $validated['description'] ?? null,
            latitude: $validated['latitude'] ?? null,
            longitude: $validated['longitude'] ?? null,
            cover: $validated['cover'] ?? null,
            gallery: $validated['gallery'] ?? null,
            active: $validated['active'],
        );

        $coworking = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $coworking->jsonSerialize(),
        ], 201);
    }
}
