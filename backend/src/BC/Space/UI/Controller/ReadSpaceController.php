<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Space\Application\UseCase\ReadSpaceUseCase;

class ReadSpaceController extends Controller
{
    public function __construct(
        private readonly ReadSpaceUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $space = $this->useCase->execute($id);

        if (!$space) {
            return response()->json([
                'status' => 'error',
                'error' => "Space with id {$id} not found.",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $space->jsonSerialize(),
        ]);
    }
}
