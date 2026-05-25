<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Space\Application\UseCase\ReadSpaceBySlugUseCase;

class ReadSpaceBySlugController extends Controller
{
    public function __construct(
        private readonly ReadSpaceBySlugUseCase $useCase,
    ) {
    }

    public function __invoke(string $slug): JsonResponse
    {
        $space = $this->useCase->execute($slug);

        if (!$space) {
            return response()->json(['status' => 'error', 'error' => 'Space not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $space->jsonSerialize()]);
    }
}
