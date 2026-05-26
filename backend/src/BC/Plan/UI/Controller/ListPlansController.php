<?php

namespace Src\BC\Plan\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\Plan\Application\UseCase\ListPlansUseCase;

class ListPlansController extends Controller {

    public function __construct(private readonly ListPlansUseCase $useCase) {}

    public function __invoke(Request $request): JsonResponse {
        $page = (int) $request->get('page', 1);
        $perPage = (int) $request->get('perPage', 15);

        $result = $this->useCase->execute($page, $perPage);

        return response()->json([
            'status' => 'success',
            'data' => array_map(fn ($item) => $item->jsonSerialize(), $result['data']),
            'meta' => $result['meta'],
        ]);
    }
}
