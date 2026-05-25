<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Plan\Application\DTO\PlanUpdateDTO;
use Src\BC\Plan\Application\UseCase\UpdatePlanUseCase;

class UpdatePlanController extends Controller
{
    public function __construct(
        private readonly UpdatePlanUseCase $useCase,
    ) {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|numeric',
            'duration' => 'sometimes|string|max:255',
            'credits' => 'sometimes|integer',
            'meeting_hours' => 'sometimes|integer',
            'access247' => 'sometimes|boolean',
            'active' => 'sometimes|boolean',
        ]);

        $dto = new PlanUpdateDTO(
            id: $id,
            name: $validated['name'] ?? null,
            description: $validated['description'] ?? null,
            price: $validated['price'] ?? null,
            duration: $validated['duration'] ?? null,
            credits: $validated['credits'] ?? null,
            meetingHours: $validated['meeting_hours'] ?? null,
            access247: $validated['access247'] ?? null,
            active: $validated['active'] ?? null,
        );

        try {
            $plan = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $plan->jsonSerialize(),
        ]);
    }
}
