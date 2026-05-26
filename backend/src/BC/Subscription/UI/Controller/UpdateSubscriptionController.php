<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Subscription\Application\DTO\SubscriptionUpdateDTO;
use Src\BC\Subscription\Application\UseCase\UpdateSubscriptionUseCase;

class UpdateSubscriptionController extends Controller {

    public function __construct( private readonly UpdateSubscriptionUseCase $useCase) {}

    public function __invoke(string $id, Request $request): JsonResponse {
        $validated = $request->validate([
            'user_id' => 'sometimes|uuid',
            'plan_id' => 'sometimes|uuid',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|nullable|date',
            'auto_renewal' => 'sometimes|boolean',
            'status' => 'sometimes|string|max:255',
        ]);

        $dto = new SubscriptionUpdateDTO(
            id: $id,
            userId: $validated['user_id'] ?? null,
            planId: $validated['plan_id'] ?? null,
            startDate: $validated['start_date'] ?? null,
            endDate: $validated['end_date'] ?? null,
            autoRenewal: $validated['auto_renewal'] ?? null,
            status: $validated['status'] ?? null,
        );

        try {
            $subscription = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $subscription->jsonSerialize(),
        ]);
    }
}
