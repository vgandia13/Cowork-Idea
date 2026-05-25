<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Space\Application\UseCase\ToggleStatusSpaceUseCase;

class ToggleStatusSpaceController extends Controller
{
    public function __construct(
        private readonly ToggleStatusSpaceUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        try {
            $space = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $space->jsonSerialize()]);
    }
}
