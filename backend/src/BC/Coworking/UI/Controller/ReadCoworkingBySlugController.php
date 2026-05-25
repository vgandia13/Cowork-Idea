<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Coworking\Application\UseCase\ReadCoworkingBySlugUseCase;

class ReadCoworkingBySlugController extends Controller
{
    public function __construct(
        private readonly ReadCoworkingBySlugUseCase $useCase,
    ) {
    }

    public function __invoke(string $slug): JsonResponse
    {
        $coworking = $this->useCase->execute($slug);

        if (!$coworking) {
            return response()->json(['status' => 'error', 'error' => 'Coworking not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $coworking->jsonSerialize()]);
    }
}
