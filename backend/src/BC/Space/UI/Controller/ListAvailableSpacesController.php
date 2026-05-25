<?php

namespace Src\BC\Space\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Space\Application\UseCase\ListAvailableSpacesUseCase;

class ListAvailableSpacesController extends Controller
{
    public function __construct(
        private readonly ListAvailableSpacesUseCase $useCase,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $spaces = $this->useCase->execute(
            $request->query('start_date'),
            $request->query('end_date'),
            $request->query('type'),
            $request->query('coworking_id'),
        );

        return response()->json(['status' => 'success', 'data' => $spaces->jsonSerialize()]);
    }
}
