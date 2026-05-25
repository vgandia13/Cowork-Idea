<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Plan\Application\UseCase\ToggleActivePlanUseCase;

class ToggleActivePlanController extends Controller
{
    public function __construct(
        private readonly ToggleActivePlanUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        try {
            $plan = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $plan->jsonSerialize()]);
    }
}
