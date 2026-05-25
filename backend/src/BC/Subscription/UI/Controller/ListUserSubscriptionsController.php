<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Subscription\Application\UseCase\ListUserSubscriptionsUseCase;

class ListUserSubscriptionsController extends Controller
{
    public function __construct(
        private readonly ListUserSubscriptionsUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $subscriptions = $this->useCase->execute($id);

        return response()->json(['status' => 'success', 'data' => $subscriptions->jsonSerialize()]);
    }
}
