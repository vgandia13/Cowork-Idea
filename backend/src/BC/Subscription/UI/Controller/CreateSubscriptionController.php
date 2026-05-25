<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Subscription\Application\DTO\SubscriptionDTO;
use Src\BC\Subscription\Application\UseCase\CreateSubscriptionUseCase;

class CreateSubscriptionController extends Controller
{
    public function __construct(
        private readonly CreateSubscriptionUseCase $useCase,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|uuid',
            'plan_id' => 'required|uuid',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'auto_renewal' => 'required|boolean',
            'status' => 'required|string|max:255',
        ]);

        $dto = new SubscriptionDTO(
            id: null,
            userId: $validated['user_id'],
            planId: $validated['plan_id'],
            startDate: $validated['start_date'],
            endDate: $validated['end_date'] ?? null,
            autoRenewal: $validated['auto_renewal'],
            status: $validated['status'],
        );

        $subscription = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $subscription->jsonSerialize(),
        ], 201);
    }
}
