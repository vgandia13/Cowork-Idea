<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Space\Application\UseCase\DeleteSpaceUseCase;

class DeleteSpaceController extends Controller
{
    public function __construct(
        private readonly DeleteSpaceUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
