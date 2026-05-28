<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Coworking\Application\UseCase\ToggleActiveCoworkingUseCase;

class ToggleActiveCoworkingController extends Controller {

    public function __construct(private readonly ToggleActiveCoworkingUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        try {
            $coworking = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $coworking->jsonSerialize()]);
    }
}
