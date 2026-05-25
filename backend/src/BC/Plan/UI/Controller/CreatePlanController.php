<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Plan\Application\DTO\PlanDTO;
use Src\BC\Plan\Application\UseCase\CreatePlanUseCase;

class CreatePlanController extends Controller
{
    public function __construct(
        private readonly CreatePlanUseCase $useCase,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'credits' => 'required|integer',
            'meeting_hours' => 'required|integer',
            'access247' => 'required|boolean',
            'active' => 'required|boolean',
        ]);

        $dto = new PlanDTO(
            id: null,
            name: $validated['name'],
            description: $validated['description'] ?? null,
            price: $validated['price'],
            duration: $validated['duration'],
            credits: $validated['credits'],
            meetingHours: $validated['meeting_hours'],
            access247: $validated['access247'],
            active: $validated['active'],
        );

        $plan = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $plan->jsonSerialize(),
        ], 201);
    }
}
