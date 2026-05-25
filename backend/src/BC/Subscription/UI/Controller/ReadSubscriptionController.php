<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Subscription\Application\UseCase\ReadSubscriptionUseCase;

class ReadSubscriptionController extends Controller
{
    public function __construct(
        private readonly ReadSubscriptionUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $subscription = $this->useCase->execute($id);

        if (!$subscription) {
            return response()->json([
                'status' => 'error',
                'error' => "Subscription with id {$id} not found.",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $subscription->jsonSerialize(),
        ]);
    }
}
