<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Plan\Application\UseCase\ReadPlanUseCase;

class ReadPlanController extends Controller {

    public function __construct( private readonly ReadPlanUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        $plan = $this->useCase->execute($id);

        if (!$plan) {
            return response()->json([
                'status' => 'error',
                'error' => "El plan con el id {$id} no existe",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $plan->jsonSerialize(),
        ]);
    }
}
