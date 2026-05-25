<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Coworking\Application\UseCase\ListCoworkingSpacesUseCase;

class ListCoworkingSpacesController extends Controller
{
    public function __construct(
        private readonly ListCoworkingSpacesUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $spaces = $this->useCase->execute($id);

        return response()->json(['status' => 'success', 'data' => $spaces->jsonSerialize()]);
    }
}
