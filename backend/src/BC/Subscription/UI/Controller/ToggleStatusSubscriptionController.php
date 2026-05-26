<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Subscription\Application\UseCase\ToggleStatusSubscriptionUseCase;

class ToggleStatusSubscriptionController extends Controller {

    public function __construct(private readonly ToggleStatusSubscriptionUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        try {
            $subscription = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $subscription->jsonSerialize()]);
    }
}
