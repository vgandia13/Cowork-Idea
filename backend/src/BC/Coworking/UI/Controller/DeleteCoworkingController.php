<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Coworking\Application\UseCase\DeleteCoworkingUseCase;

class DeleteCoworkingController extends Controller {

    public function __construct(private readonly DeleteCoworkingUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
