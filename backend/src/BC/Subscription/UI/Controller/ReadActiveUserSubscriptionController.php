<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Subscription\Application\UseCase\ReadActiveUserSubscriptionUseCase;

class ReadActiveUserSubscriptionController extends Controller
{
    public function __construct(
        private readonly ReadActiveUserSubscriptionUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $subscription = $this->useCase->execute($id);

        if (!$subscription) {
            return response()->json(['status' => 'error', 'error' => 'Active subscription not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $subscription->jsonSerialize()]);
    }
}
