<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Plan\Application\UseCase\DeletePlanUseCase;

class DeletePlanController extends Controller {
    
    public function __construct(private readonly DeletePlanUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
